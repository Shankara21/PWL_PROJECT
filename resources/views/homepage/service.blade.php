@extends('homepage.layouts.main')

@section('content')
<div class="container-xxl py-5 bg-primary hero-header mb-5">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Service</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
            <h2 class="mt-2">Kenapa memilih GO Rent?</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fas fa-car-alt fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Armada terawat dengan baik</h5>
                    <p>Kami memastikan bahwa armada yang kami sediakan dalam kondisi sangat baik dan siap pakai, dan
                        kami selalu mengecek kendaraan sebelum disewakan.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fas fa-key fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Bisa lepas kunci</h5>
                    <p>Kami menyediakan opsi penyewaan include dengan sopir, namun kami juga menyediakan opsi jika anda
                        hanya ingin menyewa kendaraan saja.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fas fa-id-badge fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Sopir berpengalaman</h5>
                    <p>Sopir-sopir yang kami gunakan adalah sopir yang sudah memiliki pengalaman diatas 5 tahun bekerja
                        dan sudah memiliki jam terbang tinggi.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">

                        <i class="fas fa-ribbon fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Telah bersertifikat</h5>
                    <p>Anda tidak perlu ragu untuk menyewa di tempat kami karena kami telah memiliki sertifikat resmi.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Berpengalaman lebih dari 5 tahun</h5>
                    <p>Dengan pengalaman selama lebih dari 5 tahun dalam melayani anda tentunya kami akan memberikan
                        service maksimal untuk pelanggan yang terhormat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fas fa-user-shield fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Memberikan Garansi</h5>
                    <p>Kami akan siap untuk memberikan jaminan apabila nantinya terjadi hal-hal yang tidak diinginkan
                        terjadi, jadi anda tidak perlu takut untuk menyewa di tempat kami.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
@endsection