<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\order;
use App\Models\kategori;
use App\Models\keranjang;
use App\Models\detailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KeranjangController;

class MenuController extends Controller
{

    public function index()
    {
        return view("home", ["active" => "home", "menu" => item::get()]);
    }


    // Has been Changed exist -> via JS then go to this Method
    public function saveLatestChange($collection)
    {
        dd($collection);
        for ($i = 0; $i < keranjang::count(); $i++) {
            $x = keranjang::get("kuantitas");
            if ($collection[$i] != $x) {
                $temp = [
                    "kuantitas" => $collection[$i],
                ];
                keranjang::where('item_id', $i + 1)->update($temp);
            }
        }
    }

    public function beli(item $item)
    {

        for ($i = 0; $i < keranjang::count(); $i++) {
            $x = keranjang::get("item_id");
            if ($item->id === $x[$i]->item_id) {

                $y = keranjang::get();

                $temp = [
                    "kuantitas" => $y[$i]->kuantitas + 1,
                ];
                keranjang::where('item_id', $item->id)->update($temp);
                return redirect('pesanan');
            }
        }

        $keranjang = [
            "item_id" => $item->id,
            "kuantitas" => 1
        ];
        keranjang::create($keranjang);
        return redirect("pesanan");
        // return view("pesanan", ["active" => "pesanan", "title" => "Pesanan", "pilihan" => "garden", "keranjang" => keranjang::get()]);
    }

    public function gatePilih(kategori $kategori)
    {
        if ($kategori->nama_kategori == "Makanan") {
            return redirect("MenuMakanan");
        } else if ($kategori->nama_kategori == "Minuman") {
            return redirect("MenuMinuman");
        }
    }

    public function pilihMakanan()
    {
        if (isset($changed)) {
            $this->saveLatestChange($changed);
        }
        return view("jajans", ["active" => "daftarMenu", "title" => "Makanan", "pilihan" => "food", "menu" => item::get()->where('kategori_id', '1')]);
    }

    public function pilihMinuman()
    {
        if (isset($changed)) {
            $this->saveLatestChange($changed);
        }
        return view("jajans", ["active" => "daftarMenu", "title" => "Minuman", "pilihan" => "drinks", "menu" => item::get()->where('kategori_id', '2')]);
    }

    public function pesanan()
    {
        if (isset($edit)) {
            return redirect("editPesanan");
        }
        return view("pesanan", ["active" => "pesanan", "title" => "Pesanan", "pilihan" => "garden", "keranjang" => keranjang::get()]);
    }

    public function editPesanan(order $order)
    {
        return view("pesanan", ["active" => "pesanan", "order" => $order->nama_pemesan, "title" => "Edit Pesanan", "pilihan" => "garden", "keranjang" => keranjang::get()]);
    }

    // Masih ada yang perlu di fix
    public function makeOrder(Request $request)
    {

        if (isset($awp)) {
            redirect("/");
        }
        // dd($request);
        $temp = order::get("id")->last();
        $order_id = $temp->id + 1;
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

        for ($i = 0; $i < sizeof($item_id); $i++) {
            if ($request->quantity[$i] > 0) {
                $data = [
                    "order_id" => $order_id,
                    "item_id" => $request->item_id[$i],
                    "kuantitas" => $request->quantity[$i],
                    "total" => $request->totalSatuan[$i]
                ];
                detailOrder::create($data);
            } else {
                $jumlah_pesanan--;
            }
        }

        if ($request->grandTotal > 0) {
            $data2 = [
                "jumlah_pesanan" => $jumlah_pesanan,
                "nama_pemesan" => $request->nama,
                "grand_total" => $request->grandTotal,
                "total_pesanan" => $request->totalPesanan,
                "status" => "Proses",
                "employee_id" => 1,
            ];
            order::create($data2);
        }

        keranjang::truncate();


        // return dd($request);
        return view("tiket", ["orderid" => order::get()->last()->id, "date" => date("d-m-Y H:i"), "namaPemesan" => $request->nama, "grandTotal" => $request->grandTotal, "awp" => 1]);
        // foreach ($request as $x) {
        //     $data = [
        //         "order_id" => $order_id,
        //         "item_id" => $x->item_id,
        //         "kuantitas" => $x->quantity,
        //         "total" => $x->totalSatuan
        //     ];
        //     return dd($data);
        // }

    }

    public function showMenuInfo(item $item)
    {
        if (isset($changed)) {
            $this->saveLatestChange($changed);
        }
        // dd($item);
        return view("jajan", ["active" => "Home", "menu" => item::get(), "item" => $item]);
    }

    public function login()
    {
        return view("login", ["active" => "Login"]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Intended dibuatuntuk melewati Middleware
            // dd('Success');
            return redirect()->intended('/dashboard');
        }

        // dd('Failed');
        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}