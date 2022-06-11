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
        <div class="row g-4">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table text-center">
                            <thead class="justify-center">
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">Kendaraan</th>
                                    <th scope="col">Tanggal Sewa</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody class="align-baseline">
                                <tr>
                                    <td>
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td><img src="{{ asset('img/kendaraan/avanza.png') }}" alt="" width="200px"></td>
                                    <td>{{ date('Y-m-d') }}</td>
                                    <td>2 Hari</td>
                                    <td>Dengan Sopir + BBM</td>
                                    <td>Rp.275.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title text-center">Total</h3>
                        <hr>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td>Rp.275.000</td>
                                </tr>
                        </table>
                    </div>
                </div>
                <a href="/checkout" class="btn btn-primary w-100">Checkout</a>
            </div>
        </div>
    </div>
</div>
@endsection