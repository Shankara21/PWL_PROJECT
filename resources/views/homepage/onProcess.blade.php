@php
$order = \App\Models\Order::where('user_id', auth()->user()->id) -> where('status', 0) -> first();

if(!empty($order)){
$orderDetails = \App\Models\OrderDetail::where('order_id', $order -> id) -> get();
}
@endphp
@extends('homepage.layouts.main')

@section('content')
<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Cart</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Keranjang</h6>
            <h2 class="mt-2">Pesanan anda</h2>

        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="btn-group w-100" role="group">
                    <a href="/cart" class="btn btn-outline-primary {{ Request::is('cart') ? 'active' : '' }}">Belum
                        bayar <i class="far fa-credit-card"></i></a>
                    <a href="/onProcess"
                        class="btn btn-outline-primary {{ Request::is('onProcess') ? 'active' : '' }}">Dalam
                        pemimjaman <i class="fas fa-car"></i></a>
                    <a href="/history"
                        class="btn btn-outline-primary {{ Request::is('history') ? 'active' : '' }}">History
                        pinjam <i class="fas fa-history"></i></a>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table text-center">
                            <thead class="justify-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Kendaraan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal Sewa</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="align-baseline">
                                @if (!empty($order))
                                @foreach ($orderDetails as $item)
                                <tr>
                                    <td>
                                        {{-- <form action="/orderDetail/{{ $item -> id }}" method="Post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form> --}}
                                        {{ $loop -> iteration }}
                                    </td>
                                    <td>
                                        <img src="@if (!$item -> kendaraan -> image)
                                                                                {{ asset('img/kendaraan/'.$item -> kendaraan -> slug.'.png') }}
                                                                                @else
                                                                                {{asset('storage/'.$item -> kendaraan->image)}}
                                                                              @endif" alt="" width="200px">
                                    </td>
                                    <td>{{ $item -> kendaraan -> nama }}</td>
                                    <td>
                                        @if ($item -> order -> status == 0)
                                        <span class="badge rounded-pill bg-danger">Belum bayar</span>
                                        @elseif ($item -> order -> status == 1)
                                        <span class="badge rounded-pill bg-warning">Dalam Peminjaman</span>
                                        @elseif ($item -> order -> status == 2)
                                        <span class="badge rounded-pill bg-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>{{ $item -> tanggal_sewa }}</td>
                                    <td>{{ $item -> lama_sewa }}</td>
                                    <td>@if ($item -> opsi == 1)
                                        {{ 'Tanpa Sopir' }}
                                        @elseif ($item -> opsi == 2)
                                        {{ 'Dengan Sopir' }}
                                        @else
                                        {{ 'Dengan Supir + BBM' }}
                                        @endif</td>
                                    <td>Rp.{{ number_format($item -> harga_sewa) }}</td>
                                    <td>{{ $item -> catatan }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <h5>Keranjang kosong</h5>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection