@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Order</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="/dashboard/kendaraan" class="btn btn-danger">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h1 class="d-inline">Detail Pemesanan</h1>
                                </div>
                            </div>
                            <hr>
                            <div class="col-6">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <h4>Nama </h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $kendaraan -> nama }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Brand</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    {{ $kendaraan -> brand -> nama }}
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Type</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $kendaraan -> type -> nama }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Warna</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $kendaraan -> tahun }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Tahun</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    {{ $kendaraan -> tahun }}
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Harga</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    Rp. {{ number_format($kendaraan -> harga) }}
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Plat Nomor</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $kendaraan -> plat_nomor }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Deskripsi</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $kendaraan -> deskripsi }}</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <img src="@if (!$kendaraan -> image)
                                            {{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}
                                            @else
                                            {{asset('storage/'.$kendaraan->image)}}
                                          @endif" alt="" height="250px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection