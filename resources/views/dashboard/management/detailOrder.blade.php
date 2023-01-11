@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Pesanan Order ID : {{ $order->id }}</h1>
    </div>


    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm col-lg-8">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Macam Produk</th>
                    <th scope="col">Total Pesanan</th>
                    <th scope="col">Grand Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Tanggal di Pesan</th>
                    <th scope="col">Tanggal di Update</th>
                </tr>
            </thead>
            <tbody>

                {{-- @foreach ($order as $x) --}}
                {{-- @for ($i = 0; $i < 5; $i++) --}}
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->nama_pemesan }}</td>
                    <td>{{ $order->jumlah_pesanan }}</td>
                    <td>{{ $order->total_pesanan }}</td>
                    <td>{{ $order->grand_total }}</td>
                    @if ($order->status === 'Complete')
                        <td> <a href="#" class="badge bg-success"><span data-feather="check-circle"></span></a>
                        </td>
                    @elseif($order->status === 'Proses')
                        <td><a href="#" class="badge bg-warning"><span data-feather="alert-circle"></span></a>
                        </td>
                    @else
                        <td><a href="#" class="badge bg-danger"><span data-feather="x"></span></a>
                        </td>
                    @endif
                    <td>{{ Str::limit($order->employee->nama_lengkap, 24) }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>

                </tr>
                {{-- @endfor --}}
                {{-- @endforeach --}}

            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produk yang dipesan</h1>
        @if ($order->status === 'Complete')
            <div>
                <Button class="btn btn-secondary disabled ">Edit Pesanan</Button>
                <Button class="btn btn-secondary disabled">Pesanan Telah Selesai</Button>
                <button class="btn btn-danger border-0 disabled" onclick="return confirm('Are you sure?')"><span
                        data-feather="x"></span></button>
            </div>
        @elseif($order->status === 'Proses')
            <div>
                <a href="/orders/edit/{{ $order->id }}"><Button class="btn btn-info text-white">Edit Pesanan</Button></a>
                <a href="/orders/mark-complete/{{ $order->id }}"><Button class="btn btn-warning text-white"
                        onclick="return confirm('Tandai Selesai?')">Tandai
                        Telah
                        Selesai</Button></a>
                <a href="/orders/cancel/{{ $order->id }}"><button class="btn btn-danger border-0 "
                        onclick="return confirm('Cancel?')"><span data-feather="x"></span></button></a>
            </div>
        @elseif($order->status === 'Dibatalkan')
            <div>
                <Button class="btn btn-secondary disabled ">Edit Pesanan</Button>
                <Button class="btn btn-secondary disabled">Pesanan Telah Dibatalkan</Button>
                <button class="btn btn-danger border-0 disabled" onclick="return confirm('Are you sure?')"><span
                        data-feather="x"></span></button>
            </div>
        @endif


    </div>


    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm col-lg-8">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk/Menu</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Total</th>
            </thead>
            <tbody>

                @foreach ($detailOrder as $z)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $z->item->nama }}</td>
                        <td>{{ $z->kuantitas }}</td>
                        <td>{{ $z->item->harga }}</td>
                        <td>{{ $z->total }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
