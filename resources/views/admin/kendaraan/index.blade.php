@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Kendaraan</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title">Kendaraan</h4>
                                </div>
                                <div class="col col-lg-2">
                                    <a href="/dashboard/kendaraan/create" class="btn btn-primary">
                                        <i class="fas fa-plus"> Tambah Data</i>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <form action="/dashboard/kendaraan">
                                        <label for="brand" class="form-label text-center">Brand</label>
                                        <select class="default-select form-control wide mb-3" name="brand"
                                            onchange="submit()">
                                            @foreach ($brands as $brand)
                                            @if (request('brand') == $brand->id)
                                            <option value="{{ $brand->id }}">{{ $brand->nama }}</option>
                                            @else
                                            <option value="{{ $brand->id }}">{{ $brand->nama }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="/dashboard/kendaraan">
                                        <label for="category" class="form-label text-center">Category</label>
                                        <select class="default-select form-control wide mb-3" name="category"
                                            onchange="submit()">
                                            @foreach ($categories as $category)
                                            @if (request('category') == $category->id)
                                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                            @else
                                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="/dashboard/kendaraan">
                                        <label for="type" class="form-label text-center">Tipe</label>
                                        <select class="default-select form-control wide mb-3" name="type"
                                            onchange="submit()">
                                            @foreach ($types as $type)
                                            @if (request('type') == $type->id)
                                            <option value="{{ $type->id }}">{{ $type->nama }}</option>
                                            @else
                                            <option value="{{ $type->id }}">{{ $type->nama }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                        <th>Plat Nomor</th>
                                        <th>Tipe</th>
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
                                        <td><img src="@if (!$kendaraan -> image)
                                            {{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}
                                            @else
                                            {{asset('storage/'.$kendaraan->image)}}
                                          @endif" width="200px"></td>
                                        <td>{{ $kendaraan->nama }}</td>
                                        <td>{{ $kendaraan -> plat_nomor }}</td>
                                        <td>{{ $kendaraan->type->nama }}</td>
                                        <td>Rp. {{ number_format($kendaraan->harga) }}</td>
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
@include('sweetalert::alert')
@endsection