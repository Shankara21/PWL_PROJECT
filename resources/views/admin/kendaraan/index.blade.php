@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kendaraan</h4>
                        <div><a href="/dashboard/kendaraan/create" class="btn btn-primary">
                                <i class="fas fa-plus"> Tambah Data</i>
                            </a></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 1000px">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="checkAll"
                                                    required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Gambar</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Warna</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kendaraans as $kendaraan)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2"
                                                    required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td><img src="{{ asset('img/kendaraan/'.$kendaraan->slug.'.png') }}"
                                                width="250px"></td>
                                        <td><img src="@if ($kendaraan -> image == null)
                                            {{ asset('img/products/'.$kendaraan -> slug.'.jpg') }}
                                            @else
                                            {{asset('storage/'.$kendaraan->image)}}
                                          @endif" width="100px" height="100px"></td>
                                        <td>{{ $kendaraan->nama }}</td>
                                        <td>{{ $kendaraan->warna }}</td>
                                        <td>{{ $kendaraan->harga }}</td>
                                        <td>
                                            <div class="dropdown ms-auto text-end">
                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="/dashboard/kendaraan/{{$kendaraan->slug}}">Show</a>
                                                    <a class="dropdown-item"
                                                        href="/dashboard/kendaraan/{{$kendaraan->slug}}/edit">Edit</a>
                                                    <form action="/dashboard/kendaraan/{{ $kendaraan->slug }}"
                                                        method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="dropdown-item"
                                                            onclick="return confirm('Yakin?')">Delete</button>
                                                    </form>

                                                </div>
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
<<<<<<< HEAD @endsection=======@include('sweetalert::alert') @endsection>>>>>>> 5f30929de99c4ebc5b7c937b322efea5e0d898a9