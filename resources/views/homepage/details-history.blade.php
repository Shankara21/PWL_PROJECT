@extends('homepage.layouts.main')

@section('content')
<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Details Order</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Team</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Details History</h6>
            <h2 class="mt-2">Details history penyewaan </h2>
        </div>
        <div class="row">
            <h3 class="text-primary mb-3"><a href="/history"><i class="fas fa-arrow-left"></i> Kembali</a></h3>
            <div class="col-lg-7">
                <div class="w-75 text-center ">
                    <table class="table table-borderless align-baseline overflow-hidden">
                        <tbody>
                            <tr>
                                <th class="text-start">
                                    <h6>Nama Penyewa</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>{{ $orderDetails -> order -> user -> name }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>No Hp</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>{{ $orderDetails -> order -> user -> phone }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Alamat</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>{{ $orderDetails -> order -> user -> address }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>{{ $orderDetails -> order -> user -> email }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Metode Pembayaran</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>
                                        <img src="{{ asset('img/payments/'.$orderDetails -> order -> bank -> name.'.png') }}"
                                            alt="" width="150px">
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Total Harga</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>
                                        Rp. {{ number_format($orderDetails -> total_bayar) }}
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Kendaraan</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>{{ $orderDetails -> kendaraan -> nama }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Plat Nomor</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>{{ $orderDetails -> kendaraan -> plat_nomor }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Lama sewa</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>
                                        {{ number_format($orderDetails -> lama_sewa) }} hari
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Opsi sewa</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>
                                        @if ($orderDetails -> opsi == 1)
                                        Tanpa Sopir
                                        @elseif ($orderDetails -> opsi == 2)
                                        Dengan Sopir
                                        @elseif ($orderDetails -> opsi == 3)
                                        Dengan Sopir + BBM
                                        @endif
                                    </h6>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <th class="text-start">
                                    <h6>Catatan sewa</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>@if ($orderDetails -> catatan)
                                        {{ $orderDetails -> catatan }}
                                        @else
                                        -
                                        @endif</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Tanggal Kembali</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>{{ $pengembalianDetails -> tanggal_kembali }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Jatuh Tempo</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>{{ $tenggang }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Total keterlambatan</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6 class="text-danger ">@if ($selisih)
                                        {{ $selisih }} hari
                                        @else
                                        -
                                        @endif</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Total Denda</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>@if ($denda)
                                        Rp.{{ number_format($denda -> total) }}
                                        @else
                                        -
                                        @endif</h6>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">
                                    <h6>Metode Pembayaran</h6>
                                </th>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td class="text-end">
                                    <h6>@if ($denda)
                                        <img src="{{ asset('img/payments/'.$denda -> bank -> name.'.png') }}" alt=""
                                            width="150px">
                                        @else
                                        -
                                        @endif
                                    </h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="@if (!$orderDetails -> kendaraan -> image)
                                                                                {{ asset('img/kendaraan/'.$orderDetails -> kendaraan -> slug.'.png') }}
                                                                                @else
                                                                                {{asset('storage/'.$orderDetails -> kendaraan->image)}}
                                                                              @endif" alt="" width="400px">
                <div class="card text-center">
                    <div class="card-header">
                        Berkas-berkas
                    </div>
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Sewa
                                </button>
                            </li>
                            @if ($orderDetails -> opsi == 1)
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Jaminan
                                </button>
                            </li>
                            @endif
                            @if ($denda)
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Denda</button>
                            </li>
                            @endif

                        </ul>
                        <div class="tab-content pt-2">

                            @if ($orderDetails -> opsi == 1)
                            <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                style="height: 400px">
                                <h6>Berkas Jaminan Persewaan</h6>
                                <img src="{{ asset('storage/'.$orderDetails -> berkas) }}" alt="" height="300px">
                            </div>
                            @endif

                            <div class="tab-pane fade show  profile-edit pt-3" id="profile-edit" style="height: 400px">
                                <h6>Bukti Pembayaran Sewa</h6>
                                <img src="{{ asset('storage/'.$orderDetails -> bukti_pembayaran) }}" alt=""
                                    height="300px">
                            </div>

                            @if ($denda)
                            <div class="tab-pane fade pt-3" id="profile-change-password" style="height: 400px">
                                <h6>Bukti Pembayaran Denda</h6>
                                @if ($denda != null)
                                <img src="{{ asset('storage/'.$denda -> bukti_pembayaran) }}" alt="" height="300px">
                                @else
                                -
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
@endsection