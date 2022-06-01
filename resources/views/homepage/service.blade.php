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
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
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
            <h2 class="mt-2">What Solutions We Provide</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-home fa-2x"></i>
                    </div>
                    <h5 class="mb-3">SEO Optimization</h5>
                    <p>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet
                        lorem.</p>
                    <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-home fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Web Design</h5>
                    <p>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet
                        lorem.</p>
                    <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-home fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Social Media Marketing</h5>
                    <p>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet
                        lorem.</p>
                    <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-home fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Email Marketing</h5>
                    <p>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet
                        lorem.</p>
                    <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-home fa-2x"></i>
                    </div>
                    <h5 class="mb-3">PPC Advertising</h5>
                    <p>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet
                        lorem.</p>
                    <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-home fa-2x"></i>
                    </div>
                    <h5 class="mb-3">App Development</h5>
                    <p>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet
                        lorem.</p>
                    <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
@endsection