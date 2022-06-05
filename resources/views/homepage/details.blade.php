@extends('homepage.layouts.main')

@section('content')
<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Kendaran</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="/project">Kendaraan</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">{{ $kendaraan -> nama }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio Start -->
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Projects</h6>
            <h2 class="mt-2">Details Product</h2>
        </div>
        <div class="row mt-n2 wow fadeInUp justify-content-center" data-wow-delay="0.1s">
        </div>
        <div class="row  mb-4">
            <div class="col-md-6">
                <img src="{{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}" alt="" width="500px">
            </div>
            <div class="col-md-6">
                <table class="table align-baseline">
                    <tbody>
                        <tr>
                            <th>
                                <h5>Nama</h5>
                            </th>
                            <th>:</th>
                            <td>
                                <h1>{{ $kendaraan -> nama }}</h1>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <h5>Merk</h5>
                            </th>
                            <th>:</th>
                            <td>
                                <h4>{{ $kendaraan -> brand -> nama }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <h5>Warna</h5>
                            </th>
                            <th>:</th>
                            <td>
                                <h4>{{ $kendaraan -> warna }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <h5>Tahun</h5>
                            </th>
                            <th>:</th>
                            <td>
                                <h4>{{ $kendaraan -> tahun }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <h5>Harga</h5>
                            </th>
                            <th>:</th>
                            <td>
                                <h4>Rp.{{ number_format($kendaraan -> harga) }} / hari</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="order ">
                    @guest

                    <span class="text-danger text-start"><strong class="fst-italic">*Anda harus login terlebih
                            dahulu!</strong></span>
                    @endguest
                    <div class="btn-modal text-center">
                        <button type="button" class="btn btn-primary w-75" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop" @guest disabled @endguest>
                            Lanjut Pemesanan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Deskripsi</h5>
                <p>{{ $kendaraan -> deskripsi }}</p>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio End -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Pemesanan <img src="/img/form.png" alt=""
                        height="50px"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form>
                    <div class="mb-3">
                        <label class="form-label ">Nama Pemesan <i class="fas fa-user"></i></label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" autofocus
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email <i class="fas fa-envelope"></i></label>
                        <input type="email" class="form-control" value="{{ Auth::user() -> email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sopir" class="form-label">Opsi Pemesanan <img src="/img/steer.png" alt=""
                                width="20px"></label>
                        <select class="form-select" id="sopir" name="" required>
                            <option value="1">Dengan Sopir</option>
                            <option value="2">Tanpa Sopir</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="form-label">Tanggal Pesan <i
                                        class="fas fa-calendar-alt"></i></label>
                                <input type="date" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Tanggal Kembali <i
                                        class="fas fa-calendar-alt"></i></label>
                                <input type="date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">@if ($kendaraan -> category -> nama == 'Mobil')
                            Jumlah Mobil <i class="fas fa-car"></i>
                            @elseif ($kendaraan -> category -> nama == 'Motor')
                            Jumlah Motor <i class="fas fa-motorcycle"></i>
                            @endif</label>
                        <input type="number" min="0" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Lanjut Pembayaran</button>
            </div>
        </div>
    </div>
</div>
@endsection