@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Pengambalian</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengambalian</h4>
                        <div><a href="/return/pdf" class="btn btn-primary">
                                <i class="far fa-file-pdf"> Cetak PDF</i>
                            </a></div>
                    </div>
                    <div class="card-body">
                        <h5>Pilih tanggal</h5>
                        <form action="/dashboard/pengembalian">
                            <div class="input-group mb-3 w-25">
                                <input type="date" class="form-control" placeholder="Pilih tanggal" name="search"
                                    value="{{ request('search') }}" onchange="submit()">
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="example5" class="display text-center" style="min-width: 1000px">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="checkAll"
                                                    required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Nama Penyewa</th>
                                        <th>Order ID</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($returns as $return)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2"
                                                    required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{ $return->pengembalian->user->name }}</td>
                                        <td>{{ $return->pengembalian->order_id }} </td>
                                        <td>{{ $return->tanggal_kembali }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/dashboard/pengembalian/{{$return->id}}"
                                                    class="btn btn-info shadow  sharp me-1"><i class="fas fa-eye "
                                                        style="font-size: 1.5em"></i>
                                                </a>
                                            </div>
                                        </td>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

@endsection