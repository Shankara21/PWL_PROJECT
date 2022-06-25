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
                        <h4 class="card-title">Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h1 class="d-inline">Detail Denda</h1>
                                </div>
                                <div>
                                    <a href="/export/{{ $denda -> id }}" class=" btn btn-primary center"> Cetak PDF</a>
                                </div>
                            </div>
                            <hr>
                            <div class="col-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <h4>Nama Penyewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $denda -> user -> name }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Pembayaran</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    {{ $denda -> bank -> name }}
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Tanggal Sewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $denda -> orderDetail -> tanggal_sewa }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Tanggal Kembali</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $denda -> pengembalianDetail -> tanggal_kembali }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Tanggal Kembali</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    @if ($pengembalianDetail !== null)
                                                    @if ($pengembalianDetail -> tanggal_kembali)
                                                    {{ $pengembalianDetail -> tanggal_kembali }}
                                                    @else
                                                    -
                                                    @endif
                                                    @else
                                                    -
                                                    @endif
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Denda</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    @if ($pengembalian !== null)
                                                    @if ($pengembalian -> denda_id)
                                                    Rp. {{ number_format($pengembalian -> denda -> total) }}
                                                    @else
                                                    -
                                                    @endif
                                                    @else
                                                    -
                                                    @endif
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Durasi Sewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $orderDetail -> lama_sewa }} hari</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Total Pembayaran</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>Rp.{{ number_format($orderDetail -> total_bayar) }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Keterangan Sewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                @if ($orderDetail -> opsi == 1)
                                                <h4>Lepas Kunci</h4>
                                                @elseif ($orderDetail -> opsi == 2)
                                                <h4>Dengan Sopir</h4>
                                                @elseif ($orderDetail -> opsi == 3)
                                                <h4>Dengan Sopir + BBM</h4>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Catatan Sewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    @if ($orderDetail -> catatan)
                                                    {{ $orderDetail -> catatan }}
                                                    @else
                                                    -
                                                    @endif
                                                </h4>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('img/kendaraan/'.$orderDetail -> kendaraan -> slug.'.png') }}" alt=""
                                    height="250px">
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