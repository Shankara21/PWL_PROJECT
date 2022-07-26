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
<div class="container-xxl py-5 overflow-hidden">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Projects</h6>
            <h2 class="mt-2">Details Product</h2>
        </div>
        <div class="row">
        </div>
        <div class="row mt-n2 wow fadeInUp justify-content-center" data-wow-delay="0.1s">
        </div>
        <div class="row  mb-3">
            <div class="col-md-4">
                <div class="text-center">
                    <img class="rounded mt-5 img-fluid" src="@if (!$kendaraan -> image)
                                            {{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}
                                            @else
                                            {{asset('storage/'.$kendaraan->image)}}
                                          @endif" alt="" width="400px">
                    <a class="btn btn-light" href="{{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}"
                        data-lightbox="portfolio" title="Zoom in"><i class="fas fa-eye fa-2x text-primary"></i></a>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6 mb-4">
                <div style="width: 40%" class="text-center">
                    @if ($kendaraan-> stock == 1)
                    <h5 class="bg-success rounded text-white p-2"><i class="fas fa-check-circle"></i> Tersedia!</h5>
                    @elseif ($kendaraan-> stock == 0)
                    <h5 class="bg-danger rounded text-white p-2"><i class="fas fa-times-circle"></i> Tidak Tersedia!
                    </h5>
                    @endif
                </div>
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Informasi
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Fasilitas
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Harga
                                    Sewa</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview"
                                style="height: 300px">
                                <table class="table align-baseline">
                                    <tbody>
                                        <tr>
                                            <th>
                                                <h5>Nama</h5>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h2>{{ $kendaraan -> nama }}</h2>
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
                                                <h5>Tipe</h5>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $kendaraan -> type -> nama }}</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit" style="height: 300px">

                                <div class="row">
                                    <div class="col-6 mb-5">
                                        <img src="/img/gas.png" alt="" width="40px">
                                        <h5 class="d-inline" style="padding-left:.5em">Fuel</h5>
                                    </div>
                                    <div class="col-6 mb-5">
                                        <img src="/img/seat.png" alt="" width="40px">
                                        <h5 class="d-inline" style="padding-left:.5em">6 Seat</h5>
                                    </div>
                                    <div class="col-6 mb-5">
                                        <img src="/img/audio.png" alt="" width="40px">
                                        <h5 class="d-inline" style="padding-left:.5em">Audio</h5>
                                    </div>
                                    <div class="col-6 mb-5">
                                        <img src="/img/ac.png" alt="" width="40px">
                                        <h5 class="d-inline" style="padding-left:.5em">AC</h5>
                                    </div>
                                    <div class="col-6 mb-5">
                                        <img src="/img/p3k.png" alt="" width="40px">
                                        <h5 class="d-inline" style="padding-left:.5em">Obat-obatan</h5>
                                    </div>
                                    <div class="col-6 mb-5">
                                        <img src="/img/charger.png" alt="" width="40px">
                                        <h5 class="d-inline" style="padding-left:.5em">Charger</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password" style="height: 300px">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal1">
                                        *Lihat persyaratan
                                    </button>
                                </div>
                                <h5>Lepas Kunci</h5>
                                <ul>
                                    <li>
                                        <h6>Rp. {{ number_format($kendaraan -> harga) }}</h6>
                                    </li>
                                </ul>
                                <h5>Dengan Sopir</h5>
                                <ul>
                                    <li>
                                        <h6>Rp. {{ number_format($dengan_sopir) }}</h6>
                                    </li>
                                </ul>
                                <h5>Dengan Sopir + BBM</h5>
                                <ul>
                                    <li>
                                        <h6>Rp. {{ number_format($sopir_bbm) }}</h6>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Deskripsi {{ $kendaraan -> category -> nama }}</h5>
                <p>{{ $kendaraan -> deskripsi }}</p>
            </div>
            <div class="col-md-6">
                <div class="order ">
                    @guest
                    <span class="text-danger text-start"><strong class="fst-italic">*Anda harus login terlebih
                            dahulu!</strong></span>
                    @endguest

                    <div class="btn-modal text-end" style="padding-right: 7em">
                        <button type="button" class="btn btn-primary w-75 " data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop" @guest disabled @endguest @if ($kendaraan -> stock == 0)
                            disabled
                            @endif>
                            Lanjut Pemesanan <i class="fas fa-credit-card"></i>
                        </button>
                    </div>
                    @if ($kendaraan -> stock == 0)
                    <span class="text-danger text-start"><strong class="fst-italic">*Maaf kendaraan yang anda pilih
                            tidak tersedia</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
{{-- Pemesanan --}}
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
                <form action="/orderDetail" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $kendaraan -> id }}" name="kendaraan_id">
                    <input type="hidden" value="{{ Auth::user() -> id }}" name="user_id">
                    <div class="mb-3">
                        <label class="form-label ">Nama Pemesan <i class="fas fa-user"></i></label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" autofocus
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email <i class="fas fa-envelope"></i></label>
                        <input type="email" class="form-control" value="{{ Auth::user() -> email }}" name="email"
                            required>
                    </div>
                    @if ($kendaraan -> category -> nama == 'Mobil')
                    <div class="mb-3">
                        <label for="sopir" class="form-label">Opsi Pemesanan <img src="/img/steer.png" alt=""
                                width="20px"></label>
                        <select class="form-select" id="sopir" name="opsi" required>
                            <option value="1">Tanpa Sopir</option>
                            <option value="2">Dengan Sopir</option>
                            <option value="3">Dengan Sopir + BBM</option>
                        </select>
                    </div>
                    @endif
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="form-label">Tanggal Sewa <i
                                        class="fas fa-calendar-alt"></i></label>
                                <input type="date" class="form-control" name="tanggal_sewa" required
                                    value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Lama sewa @if ($kendaraan -> category -> nama == 'Mobil')
                                    <i class="fas fa-car"></i>
                                    @elseif ($kendaraan -> category -> nama == 'Motor') <i
                                        class="fas fa-motorcycle"></i>
                                    @endif</label>
                                <input type="number" min="1" class="form-control" name="lama_sewa" value="1" required>
                                <small>*dalam hari</small>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Catatan <i class="fas fa-edit"></i></label>
                        <textarea class="form-control" name="catatan" style="height: 100px"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" @if ($status) disabled @endif>Simpan Pesanan</button>
                @if ($status)
                <small class="text-danger">*Untuk memesan kendaraan, selesaikan peminjaman dahulu</small>
                @endif
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Syarat dan ketentuan --}}
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Syarat dan Ketentuan Sewa @if ($kendaraan -> category ->
                    nama == 'Mobil')
                    Lepas Kunci
                    @endif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Berkas yang diperlukan!</h5>
                <ul>
                    <li>
                        <h6>KTP (Asli)</h6>
                    </li>
                    <li>
                        <h6>*KTM (Asli)</h6>
                    </li>
                    <li>
                        <h6>Bersedia Menunjukkan SIM @if ($kendaraan -> category -> nama == 'Mobil')
                            A
                            @elseif ($kendaraan -> category -> nama == 'Motor') C
                            @endif</h6>
                    </li>
                </ul>
                <p>*Keterangan (*) bila ada</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Mengerti!</button>
            </div>
        </div>
    </div>
</div>
@endsection