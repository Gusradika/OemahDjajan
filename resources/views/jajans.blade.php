@extends('layouts.main')
@section('container')
    {{-- Pilihan dari Query --}}
    <section class="pilihan">
        <div class="container my-5 d-md-flex justify-content-between">
            <div>
                <h1>{{ $title }}</h1>
            </div>

            <div class=" ">
                @if ($title === 'Makanan')
                    <button class="btn btn-primary me-md-2 btn-lg disabled " type="button"><a href="MenuMakanan"
                            class="text-white text-decoration-none">Makanan</a></button>
                    <button class="btn btn-primary btn-lg " type="button" href="MenuMinuman"><a href="MenuMinuman"
                            class="text-white text-decoration-none">Minuman
                        </a></button>
                @else
                    <button class="btn btn-primary me-md-2 btn-lg " type="button"><a href="MenuMakanan"
                            class="text-white text-decoration-none">Makanan</a></button>
                    <button class="btn btn-primary btn-lg disabled" type="button" href="MenuMinuman"><a href="MenuMinuman"
                            class="text-white text-decoration-none">Minuman
                        </a></button>
                @endif
            </div>
        </div>
    </section>

    {{-- Cards --}}
    <section class="cards">
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
                                <img src="https://source.unsplash.com/500x400/?food" class="card-img-top" alt="Jajan">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title"><a href="/menu/{{ $x->id }}"
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
