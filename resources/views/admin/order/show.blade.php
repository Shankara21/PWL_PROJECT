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
                            <h1>Detail Pemesanan</h1>
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
                                                <h4>{{ $order -> user -> name }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Status</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    @if ($order -> status == 0)
                                                    <span class="badge badge-danger">Belum Dibayar</span>
                                                    @elseif ($order -> status == 1)
                                                    <span class="badge badge-warning">Sedang Diproses</span>
                                                    @elseif ($order -> status == 2)
                                                    <span class="badge badge-success">Selesai</span>
                                                    @endif
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Nama Kendaraan</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $orderDetail -> kendaraan -> nama }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Tanggal Sewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $orderDetail -> tanggal_sewa }}</h4>
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
                                                <h4>Harga Sewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>Rp.{{ number_format($orderDetail -> harga_sewa) }}</h4>
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
                                                <h4>{{ $orderDetail -> catatan }}</h4>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('img/kendaraan/'.$orderDetail -> kendaraan -> slug.'.png') }}" alt=""
                                    height="250px">
                                <div class="accordion accordion-no-gutter accordion-header-bg" id="accordion-three">
                                    <div class="accordion-item">
                                        <div class="accordion-header  rounded-lg" id="accord-3One"
                                            data-bs-toggle="collapse" data-bs-target="#collapse3One"
                                            aria-controls="collapse3One" aria-expanded="true" role="button">
                                            <span class="accordion-header-text">Bukti Pembayaran</span>
                                            <span class="accordion-header-indicator"></span>
                                        </div>
                                        <div id="collapse3One" class="collapse accordion__body show"
                                            aria-labelledby="accord-3One" data-bs-parent="#accordion-three">
                                            <div class="accordion-body-text">
                                                <img src="{{ asset('storage/'.$order -> bukti_pembayaran) }}" alt=""
                                                    height="300px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header collapsed rounded-lg" id="accord-3Two"
                                            data-bs-toggle="collapse" data-bs-target="#collapse3Two"
                                            aria-controls="collapse3Two" aria-expanded="true" role="button">
                                            <span class="accordion-header-text">Berkas persewaan</span>
                                            <span class="accordion-header-indicator"></span>
                                        </div>
                                        <div id="collapse3Two" class="collapse accordion__body"
                                            aria-labelledby="accord-3Two" data-bs-parent="#accordion-three">
                                            <div class="accordion-body-text">
                                                <img src="{{ asset('storage/'.$order -> berkas) }}" alt=""
                                                    height="300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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