@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Item</h1>
    </div>
    <a href="/createProduk" class="mb-4"><button type="button" class="btn btn-primary"><span data-feather="plus"></span> Add
            Item</button></a>


    {{-- Alert dari Session dari create --}}
    @if (session()->has('success'))
        <div class="alert alert-info col-lg-8 mt-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert dari deleted --}}
    @if (session()->has('deleted'))
        <div class="alert alert-danger col-lg-8 mt-4" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm col-lg-8">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Item</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Netto</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tanggal dibuat</th>
                    <th scope="col">Tanggal diupdate</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($item as $x)
                    {{-- @for ($i = 0; $i < 5; $i++) --}}
                    <tr>
                        <td>{{ $x->id }}</td>
                        <td>{{ $x->nama }}</td>
                        <td>{{ $x->Kategori->nama_kategori }}</td>
                        <td>{{ $x->netto }}</td>
                        <td>
                            @if ($x->gambar)
                                <img src="{{ asset('storage/' . $x->gambar) }}" alt="" style="max-height: 200px;">
                            @else
                                <img src="{{ asset('storage/notFound.jpg') }}" alt="">
                            @endif
                        </td>
                        <td>{{ $x->excerpt }}</td>
                        <td>{{ $x->harga }}</td>

                        <td>{{ $x->created_at }}</td>
                        <td>{{ $x->updated_at }}</td>
                        <td>
                            <a href="/menu/{{ $x->id }}" class="badge bg-info text-decoration-none"><span
                                    data-feather="eye"></span> View</a>
                            {{-- Edit Default Penulisan --}}
                            <a href="/dashboard/editProduk/{{ $x->id }}"
                                class="badge bg-warning text-decoration-none"><span data-feather="edit"></span> Edit</a>

                            <a href="/deleteProduk/{{ $x->id }}"> <button type="button"
                                    class="badge bg-danger border-0 text-decoration-none"
                                    onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>
                                    Delete</button></a>


                        </td>


                    </tr>
                    {{-- @endfor --}}
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
