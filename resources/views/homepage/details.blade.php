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
                <div class="text-center">
                    <img src="{{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}" alt="" width="500px">
                    <a class="btn btn-light" href="{{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}"
                        data-lightbox="portfolio" title="Zoom in"><i class="fas fa-eye fa-2x text-primary"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="accordion mb-4" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5 style="padding-right:1em">Informasi Kendaraan</h5> <img src="/img/information.png"
                                    alt="" width="40px">
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
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
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h5 style="padding-right:1em">Spesifikasi Kendaraan</h5> <img src="/img/test.png" alt=""
                                    width="40px">
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <img src="/img/gas.png" alt="" width="20px">
                                        <h6 class="d-inline" style="padding-left:.5em">Fuel</h6>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <img src="/img/seat.png" alt="" width="20px">
                                        <h6 class="d-inline" style="padding-left:.5em">6 Seat</h6>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <img src="/img/audio.png" alt="" width="20px">
                                        <h6 class="d-inline" style="padding-left:.5em">Audio</h6>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <img src="/img/ac.png" alt="" width="20px">
                                        <h6 class="d-inline" style="padding-left:.5em">AC</h6>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <img src="/img/p3k.png" alt="" width="20px">
                                        <h6 class="d-inline" style="padding-left:.5em">Obat-obatan</h6>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <img src="/img/charger.png" alt="" width="20px">
                                        <h6 class="d-inline" style="padding-left:.5em">charger</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h5 style="padding-right:1em">Harga Sewa</h5> <img src="/img/pricing.png" alt=""
                                    width="40px">
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <h5>Lepas Kunci</h5>
                                <ul>
                                    <li>
                                        <h6>Rp. 275.000 / 12 Jam</h6>
                                    </li>
                                    <li>
                                        <h6>Rp. 350.000 / 24 Jam</h6>
                                    </li>
                                </ul>
                                <h5>Dengan Sopir</h5>
                                <ul>
                                    <li>
                                        <h6>Rp. 275.000 / 12 Jam</h6>
                                    </li>
                                    <li>
                                        <h6>Rp. 350.000 / 24 Jam</h6>
                                    </li>
                                </ul>
                                <h5>Dengan Sopir + BBM</h5>
                                <ul>
                                    <li>
                                        <h6>Rp. 275.000 / 12 Jam</h6>
                                    </li>
                                    <li>
                                        <h6>Rp. 350.000 / 24 Jam</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

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