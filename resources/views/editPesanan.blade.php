@extends('layouts.main3')

@section('container')
    <div class="container-fluid">
        <div class="alert alert-warning col-lg-12" role="alert">
            <p>Anda Sedang berada pada Edit Mode <b>Order ID : {{ $id }} </b></p>
        </div>
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="/updateEdit" method="get">
                                    @foreach ($keranjang as $x)
                                        <tr>
                                            <td>
                                                <figure class="itemside align-items-center">
                                                    <div class="aside">
                                                        @if ($x->item->gambar != null)
                                                            <img src="{{ asset('storage/' . $x->item->gambar) }}"
                                                                class="img-sm" alt="Jajan" style="">
                                                        @else
                                                            <img src="https://source.unsplash.com/500x400/?food"
                                                                class="img-sm" alt="Jajan" style="">
                                                        @endif
                                                    </div>
                                                    <figcaption class="info"> <a href="#" class="title text-dark"
                                                            data-abc="true">{{ $x->item->nama }}</a>
                                                        <p class="text-muted small">Netto : {{ $x->item->netto }}gr </p>
                                                    </figcaption>
                                                </figure>
                                                <input type="hidden" name="item_id[]" value="{{ $x->item_id }}">
                                            </td>
                                            <td>
                                                <div class="col-md-3 col-lg-3 col-xl-3 d-flex">
                                                    <button type="button" class="btn btn-link px-2 kurang"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i data-feather="minus" class=""></i>
                                                    </button>
                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                    <input id="form1" min="0" name="quantity[]" class="quantity"
                                                        value="{{ $x->kuantitas }}" type="number" class="form-control-sm">

                                                    <button type="button" class="btn btn-link px-2 tambah"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i data-feather="plus" class=""></i>
                                                    </button>
                                                </div>


                                            </td>

                                            <td>
                                                <div class="price-wrap"> <var
                                                        class="price">{{ $x->kuantitas * $x->item->harga }}</var> <small
                                                        class="text-muted">
                                                        Rp.{{ $x->item->harga }}/Satuan </small>
                                                    <input type="hidden" name="totalSatuan[]" class="totalSatuan"
                                                        value="">

                                                </div>
                                                <input type="hidden" name="harga[]" class="hargaSatuan"
                                                    value="{{ $x->item->harga }}">
                                            </td>
                                            <td class="text-right  d-md-block"> <i class="fa fa-heart"></i></a> <a
                                                    href="/remove/{{ $x->id }}?namaLama={{ $namaLama }}&id={{ $id }}"
                                                    class="btn btn-light" data-abc="true"> <i data-feather="trash-2"
                                                        class=""></i></a> </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="form-group"> <label>Nama Pemesan</label>
                            <div class="input-group"> <input type="text" class="form-control coupon" name="nama"
                                    placeholder="Tuliskan nama anda..." value="{{ $namaLama }}" disabled required>
                            </div>
                            <input type="hidden" name="namaLama" value="{{ $namaLama }}">
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total : </dt>
                            <dd class="text-right ml-3 total">$0</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Diskon : </dt>
                            <dd class="text-right text-danger ml-3">-</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Grand Total : </dt>
                            <strong>
                                <dd class="text-right text-dark b ml-3 total">$59.97</dd>
                            </strong>
                        </dl>
                        <input type="hidden" name="totalPesanan" class="totalPesanan" value="">
                        <input type="hidden" name="grandTotal" class="grandTotal" value="">
                        <hr>
                        <button type="submit" name="submit" class="btn btn-out btn-primary btn-square btn-main mt-2"
                            data-abc="true">Simpan Perubahan</button>
                    </div>
                </div>
                </form>
            </aside>
        </div>


        <div>
            <div class="table-responsive col-lg-12 my-4">
                <table class="table table-striped table-sm col-lg-8">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Netto</th>
                            <th scope="col">excerpt</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $x)
                            <tr>
                                <td>{{ $x->id }}</td>
                                <td>{{ $x->nama }}</td>
                                <td>{{ $x->kategori->nama_kategori }}</td>
                                <td>{{ $x->netto }}</td>
                                <td>{{ $x->excerpt }}</td>
                                <td>{{ $x->harga }}</td>
                                <td><a
                                        href="/addEdit/{{ $x->id }}?namaLama={{ $namaLama }}&id={{ $id }}"><span
                                            class="badge bg-info text-decoration-none" data-feather="plus"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>

    <script>
        const price = document.querySelectorAll(".price");
        const qty = document.querySelectorAll(".quantity");
        const satuan = document.querySelectorAll(".hargaSatuan");
        const tambah = document.querySelectorAll(".tambah");
        const kurang = document.querySelectorAll(".kurang");
        const total = document.querySelectorAll(".total");
        const totalSatuan = document.querySelectorAll(".totalSatuan");
        const topesanan = document.querySelectorAll(".totalPesanan");
        const grandTotal = document.querySelectorAll(".grandTotal");
        var x = 0;
        var totalPesanan = 0;
        updatePrice();

        function updatePrice() {

            qty.forEach(function(x, i) {
                totalPesanan += +qty[i].value;
            })
            topesanan[0].value = totalPesanan;
            totalPesanan = 0;

            price.forEach(function(x, i) {
                price[i].innerHTML = satuan[i].value * qty[i].value;
                totalSatuan[i].value = satuan[i].value * qty[i].value
            });

            for (let y = 0; y < price.length; y++) {
                x += +totalSatuan[y].value;
            }
            total[0].innerHTML = x;
            total[1].innerHTML = x;
            grandTotal[0].value = x;
            x = 0;

        }

        qty.forEach(function(x) {
            x.addEventListener("change", function(y) {
                updatePrice();
            });
        })

        tambah.forEach(function(e, i) {
            e.addEventListener("click", function(x) {
                // alert("sds");
                updatePrice();
            });
        });

        kurang.forEach(function(e, i) {
            e.addEventListener("click", function(x) {
                // alert("sds");
                updatePrice();
            });
        });
    </script>
@endsection
