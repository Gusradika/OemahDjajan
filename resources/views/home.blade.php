@extends('layouts.main')
@section('container')
    {{-- Heroes --}}
    <section class="heroes" id="home">
        <div class="px-4 pt-5 my-5 text-center border-bottom">
            <h1 class="display-4 fw-bold">OEMAH DJAJAN</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Menyediakan makanan ringan dan minuman yang berkualitas<br>Buka Setiap Hari<br>Jam 10:00
                    - 21:00<br>Jl. Pondok Tirta Mandala No.63, Kota Depok, 16415</p>

            </div>
            <div class="overflow-hidden" style="max-height: 30vh;">
                <div class="container px-5">
                    <img src="{{ asset('storage/images/oemahdjajan.jpg') }}"
                        class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500"
                        loading="lazy">
                </div>
            </div>
        </div>
    </section>

    {{-- Cards --}}

    <section class="cards">
        <div class="container my-5 d-md-flex justify-content-between">

            <div>
                <h1>Pilihan Menu</h1>
            </div>

            <div class=" gap-2">
                <button class="btn btn-primary me-md-2 btn-lg" type="button"><a href="MenuMakanan"
                        class="text-decoration-none text-white">Makanan</a></button>
                <button class="btn btn-primary btn-lg" type="button"><a href="MenuMinuman"
                        class="text-decoration-none text-white">Minuman</a></button>
            </div>
        </div>

        <div class="container">
            <div class="container">
                <div class="row">
                    @foreach ($menu as $x)
                        <div class="col-lg-3 col-md-6 mb-3 col-sm-6 d-flex justify-content-between">
                            <div class="card" style="width: 18rem;">
                                <div class="position-absolute bg-dark text-white p-3 px-3 py-2" style="opacity: 0.7"><a
                                        href="pilihan/{{ $x->kategori->nama_kategori }}"
                                        class="text-decoration-none text-white">{{ $x->kategori->nama_kategori }}</a></div>
                                @if ($x->gambar != null)
                                    <img src="{{ asset('storage/' . $x->gambar) }}" class="card-img-top" alt="Jajan">
                                @else
                                    <img src="https://source.unsplash.com/500x400/?food" class="card-img-top"
                                        alt="Jajan">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title"><a href="menu/{{ $x->id }}"
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
    </section>
@endsection
