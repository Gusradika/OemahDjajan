@extends('layouts.main2')

@section('container')
    <div class="container-fluid mb-4">

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
                                <form action="/makeOrder" method="get">
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
                                                    <figcaption class="info"> <a href="menu/{{ $x->id }}"
                                                            class="title text-dark" data-abc="true">{{ $x->item->nama }}</a>
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
                                                    href="/removeItem/{{ $x->id }}" class="btn btn-light"
                                                    data-abc="true"> <i data-feather="trash-2" class=""></i></a> </td>
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
                                    placeholder="Tuliskan nama anda..." value="" required> </div>
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
                            data-abc="true">Buat
                            Pesanan</button>

                    </div>
                </div>
                </form>
            </aside>
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
