<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\order;
use App\Models\employee;
use App\Models\kategori;
use App\Models\keranjang;
use App\Models\detailOrder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dashboardController extends Controller
{
    public function index()
    {
        return view("dashboard.dashboard", ["active" => "dashboard"]);
    }

    public function showAllOrders()
    {
        return view("dashboard.management.orders", ["order" => order::get(), "menuPesanan" => "All Orders"]);
    }

    public function showAvailableOrders()
    {
        return view("dashboard.management.orders", ["order" => order::where('status', 'Proses')->get(), "menuPesanan" => "Available Orders"]);
    }

    public function showCompletedOrders()
    {
        return view("dashboard.management.orders", ["order" => order::where('status', 'Complete')->get(), "menuPesanan" => "Completed Orders"]);
    }

    public function showCanceledOrders()
    {
        return view("dashboard.management.orders", ["order" => order::where('status', 'Dibatalkan')->get(), "menuPesanan" => "Canceled Orders"]);
    }

    // Detailed Order Information
    public function showDetailedOrders(order $order)
    {

        // dd($order);
        $x = $order->id;
        return view("dashboard.management.detailOrder", ["order" => $order, "detailOrder" => detailOrder::where('order_id', $order->id)->get()]);
    }


    public function markCompleteOrder(order $order)
    {
        $status = [
            "status" => "Complete",
        ];
        order::where('id', $order->id)->update($status);
        return redirect("/dashboard/all-order")->with('success', 'Pesanan telah ter-selesaikan!');
    }

    public function cancelOrder(order $order)
    {
        $status = [
            "status" => "Dibatalkan",
        ];
        order::where('id', $order->id)->update($status);
        return redirect("/dashboard/all-order")->with('deleted', 'Pesanan telah dibatalkan!');
    }

    public function editOrder(order $order)
    {
        keranjang::truncate();
        $x = $order->id;
        for ($i = 0; $i < count(detailOrder::where("order_id", $x)->get()); $i++) {
            $z = detailOrder::where("order_id", $x)->get("item_id")[$i];
            $y = detailOrder::where("order_id", $x)->get("kuantitas")[$i];
            $data = [
                "item_id" => $z->item_id,
                "kuantitas" => $y->kuantitas
            ];

            keranjang::create($data);
        }
        return view("editPesanan", ["id" => $order->id, "namaLama" => $order->nama_pemesan, "keranjang" => keranjang::get(), "active" => "editMode", "item" => item::get()]);
    }

    public function destroy(keranjang $keranjang, request $request)
    {
        detailOrder::where("order_id", $request->id)->where("item_id", $keranjang->item_id)->delete();
        keranjang::destroy($keranjang->id);
        return view("editPesanan", ["id" => $request->id, "namaLama" => $request->namaLama, "keranjang" => keranjang::get(), "active" => "editMode", "item" => item::get()]);
    }

    public function addEdited(item $item, request $request)
    {
        for ($i = 0; $i < keranjang::count(); $i++) {
            $x = keranjang::get("item_id");
            if ($item->id === $x[$i]->item_id) {

                $y = keranjang::get();

                $temp = [
                    "kuantitas" => $y[$i]->kuantitas + 1,
                ];
                keranjang::where('item_id', $item->id)->update($temp);
                return view("editPesanan", ["id" => $request->id, "namaLama" => $request->namaLama, "keranjang" => keranjang::get(), "active" => "editMode", "item" => item::get()]);
            }
        }

        $keranjang = [
            "item_id" => $item->id,
            "kuantitas" => 1
        ];
        keranjang::create($keranjang);
        return view("editPesanan", ["id" => $request->id, "namaLama" => $request->namaLama, "keranjang" => keranjang::get(), "active" => "editMode", "item" => item::get()]);
    }

    public function updateEdit(request $request)
    {
        detailOrder::where('order_id', $request->id)->delete();
        $temp = order::get("id")->last();
        $order_id = $temp->id + 1;
        $id = $request->id;
        $item_id = $request->item_id;
        $jumlah_pesanan = sizeof($request->item_id);

        if (sizeof($item_id) <= 0) {
            return redirect("/");
        }
        if (sizeof($item_id) == 1) {
            if ($request->quantity == 0) {
                return redirect("/");
            }
        }

        $array = [];



        // Kesalahannya itu kita sedang mengupdate apa yang tidak ada di Item

        for ($i = 0; $i < sizeof($item_id); $i++) {
            $data = [
                "order_id" => $id,
                "item_id" => $request->item_id[$i],
                "kuantitas" => $request->quantity[$i],
                "total" => $request->totalSatuan[$i]
            ];
            $order_id++;
            detailOrder::create($data);
        }

        if ($request->grandTotal > 0) {
            $data2 = [
                "jumlah_pesanan" => $jumlah_pesanan,
                "nama_pemesan" => $request->namaLama,
                "grand_total" => $request->grandTotal,
                "total_pesanan" => $request->totalPesanan,
                "status" => "Proses",
                "employee_id" => 1,
            ];
            order::where("id", $id)->update($data2);;
        }

        keranjang::truncate();

        return redirect("/dashboard/order-info/" . $request->id);
    }


    public function destroyAll(Request $request)
    {
        keranjang::truncate();
        // dd($request);
        return redirect("/dashboard/order-info/" . $request->id);
    }

    public function showEmployee()
    {
        return view("dashboard.management.employee", ["employee" => employee::get()]);
    }

    public function showProduks()
    {
        return view("dashboard.management.produk", ["item" => item::get()]);
    }
    public function showKategori()
    {
        return view("dashboard.management.kategori", ["kategori" => kategori::get()]);
    }

    public function editProduk(item $item)
    {
        return view("dashboard.management.editProduk", ["item" => $item, "kategori" => kategori::get()]);
    }

    public function createProduk(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'namaItem' => 'required|max:255',
            'category_id' => 'required',
            'netto' => 'required',
            'image' => 'image|file|max:1500',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images');
        }
        if ($request->image) {
            $validatedData = [
                'nama' => $request->namaItem,
                'kategori_id' => $request->category_id,
                'netto' => $request->netto,
                'gambar' => $request->file('image')->store('images'),
                'deskripsi' => strip_tags($request->deskripsi),
                'excerpt' => Str::limit(strip_tags($request->deskripsi)),
                'harga' => $request->harga,
            ];
        } else {
            $validatedData = [
                'nama' => $request->namaItem,
                'kategori_id' => $request->category_id,
                'netto' => $request->netto,
                'deskripsi' => strip_tags($request->deskripsi),
                'excerpt' => Str::limit(
                    strip_tags($request->deskripsi),
                    50
                ),
                'harga' => $request->harga,
            ];
        }

        // dd($validatedData);
        item::create($validatedData);
        return redirect('/dashboard/produk')->with('success', 'Berhasil Menambahkan Item!');
    }

    public function updateProduk(Request $request, item $item)
    {

        $rules = [
            'namaItem' => 'required|max:255',
            'category_id' => 'required',
            'netto' => 'required',
            'image' => 'image|file|max:1500',
            'deskripsi' => 'required',
            'harga' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('images');
        }

        if ($request->image) {
            $validatedData = [
                'nama' => $request->namaItem,
                'kategori_id' => $request->category_id,
                'netto' => $request->netto,
                'gambar' => $request->file('image')->store('images'),
                'deskripsi' => strip_tags($request->deskripsi),
                'excerpt' => Str::limit(strip_tags($request->deskripsi)),
                'harga' => $request->harga,
            ];
        } else {
            $validatedData = [
                'nama' => $request->namaItem,
                'kategori_id' => $request->category_id,
                'netto' => $request->netto,
                'deskripsi' => strip_tags($request->deskripsi),
                'excerpt' => Str::limit(
                    strip_tags($request->deskripsi),
                    50
                ),
                'harga' => $request->harga,
            ];
        }



        // dd($validatedData);
        item::where("id", $item->id)->update($validatedData);
        return redirect('/dashboard/produk')->with('success', 'Berhasil Update Barang');
    }



    public function debug(Request $request)
    {
        dd($request);
    }

    public function showNewProdukForm()
    {
        return view('dashboard.management.newProduk', ["kategori" => kategori::get()]);
    }

    public function deleteProduk(item $item)
    {
        item::destroy("id", $item->id);
        return redirect("/dashboard/produk",)->with("deleted", "Produk berhasil di delete");
    }
}