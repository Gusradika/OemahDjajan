@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $menuPesanan }}</h1>
    </div>

    {{-- Alert dari Session dari create --}}
    @if (session()->has('success'))
        <div class="alert alert-info col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert dari deleted --}}
    @if (session()->has('deleted'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm col-lg-8">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Macam Produk</th>
                    <th scope="col">Total Pesanan</th>
                    <th scope="col">Grand Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Tanggal di Pesan</th>
                    <th scope="col">Tanggal di Update</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($order as $x)
                    {{-- @for ($i = 0; $i < 5; $i++) --}}
                    <tr>
                        <td>{{ $x->id }}</td>
                        <td>{{ $x->nama_pemesan }}</td>
                        <td>{{ $x->jumlah_pesanan }}</td>
                        <td>{{ $x->total_pesanan }}</td>
                        <td>{{ $x->grand_total }}</td>
                        @if ($x->status === 'Complete')
                            <td> <a href="#" class="badge bg-success"><span data-feather="check-circle"></span></a>
                            </td>
                        @elseif($x->status === 'Proses')
                            <td><a href="#" class="badge bg-warning"><span data-feather="alert-circle"></span></a>
                            </td>
                        @else
                            <td><a href="#" class="badge bg-danger"><span data-feather="x"></span></a>
                            </td>
                        @endif
                        <td>{{ Str::limit($x->employee->nama_lengkap, 24) }}</td>
                        <td>{{ $x->created_at }}</td>
                        <td>{{ $x->updated_at }}</td>
                        <td>
                            <a href="/dashboard/order-info/{{ $x->id }}"
                                class="badge bg-info text-decoration-none"><span data-feather="eye"></span> View</a>
                            {{-- Edit Default Penulisan --}}
                            {{-- <a href="#" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                            {{-- <form action="#" method="post" class="d-inline">
                                @csrf
                                <button class="badge bg-danger border-0 " onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form> --}}

                        </td>
                    </tr>
                    {{-- @endfor --}}
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
