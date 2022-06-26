@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Pengembalian</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengembalian</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h1 class="d-inline">Detail Pengembalian</h1>
                                </div>
                            </div>
                            <hr>
                            <div class="col-6">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <h4>Nama Penyewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $return -> pengembalian -> user -> name }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Tanggal Kembali</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $return -> tanggal_kembali }}</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                {{-- <img src="{{ asset('img/kendaraan/'.$orderDetail -> kendaraan -> slug.'.png') }}"
                                alt=""
                                height="250px"> --}}
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
