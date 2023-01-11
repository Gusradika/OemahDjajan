@extends('layouts.main')
@section('container')
    {{-- Tampilan Menu --}}
    <section class="tampilan-menu">

        {{-- <section class="upper-section"> --}}
        <div class="container container-fluid">
            <h2 class="mb-4">Detail Menu</h2>
            <div class="row mb-4 d-flex justify-content-around">
                <div class="col-lg-6 col-md-12 col-sm-7 ">
                    <div class="image img-fluid ">
                        @if ($item->gambar != null)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="Jajan">
                        @else
                            <img src="https://source.unsplash.com/500x400/?food" class="card-img-top" alt="Jajan">
                        @endif
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-7">
                    <div>
                        <h2 class="">{{ $item->nama }}</h2>
                    </div>

                    {{-- Informasi Netto dan Harga --}}
                    <div class="row mb-4 text-muted">
                        <div class="col-lg-6 col-md-12 col-sm-7">
                            <h5>Netto : {{ $item->netto }}gr</h5>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-7 ">
                            <h5>Harga : {{ $item->harga }}</h5>
                        </div>
                    </div>

                    <p class="lh-base overflow-auto text-justify"><b>Deskripsi : </b><br>
                        {{ $item->deskripsi }}
                    </p>


                </div>
            </div>



            {{-- <section class="Bottom-section"> --}}
            <div class="row d-flex justify-content-end mb-4">


                <div class="col-md-2">
                    <a href="/addorder/{{ $item->id }}"><button type="button" class="btn btn-lg btn-success">Add
                            Order</button></a>
                </div>
            </div>
            {{-- </section> --}}





            {{-- You May Also Likes --}}

            <h3 class="my-4">Produk Lainnya</h3>

            <div class="container">
                <div class="row">
                    @foreach ($menu->take(4) as $x)
                        <div class="col-lg-3 col-md-6 mb-3 col-sm-6 d-flex justify-content-between">
                            <div class="card" style="width: 15rem;">
                                <div class="position-absolute bg-dark text-white p-3 px-3 py-2" style="opacity: 0.7"><a
                                        href="{{ url('pilihan/' . $x->kategori->nama_kategori) }}"
                                        class="text-decoration-none text-white">{{ $x->kategori->nama_kategori }}</a></div>
                                @if ($x->gambar != null)
                                    <img src="{{ asset('storage/' . $x->gambar) }}" class="card-img-top" alt="Jajan">
                                @else
                                    <img src="https://source.unsplash.com/500x400/?food" class="card-img-top"
                                        alt="Jajan">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{ url('menu/' . $x->id) }}"
                                            class="text-decoration-none text-dark">{{ $x->nama }}</a>
                                    </h4>

                                    {{-- Small info  --}}
                                    <small class="text-muted">
                                        <p>Netto : {{ $x->netto }}gr
                                        </p>
                                    </small>
                                    <p class="card-text">{{ $x->excerpt }}</p>

                                    <div class="row d-flex justify-content-between a">
                                        <div class="col-md-6">
                                            <h5 class="text-danger">
                                                Rp.{{ $x->harga }}
                                            </h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="/addorder/{{ $x->id }}" class="btn btn-success">Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            {{-- Last Section --}}
        </div>
    </section>
@endsection
