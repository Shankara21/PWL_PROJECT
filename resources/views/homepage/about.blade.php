@extends('homepage.layouts.main')

@section('content')


<div class="container-xxl py-5 bg-primary hero-header mb-5 overflow-hidden">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">About Us</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- About Start -->
<div class="container-xxl py-5 overflow-hidden">
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative mb-4 pb-2">
                    <h6 class="position-relative text-primary ps-4">About Us</h6>
                    <h2 class="mt-2">The best SEO solution with 10 years of experience</h2>
                </div>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet
                    diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita
                    duo justo et tempor eirmod magna dolore erat amet</p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                        <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                        <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Fair Prices</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-4">
                    <a class="btn btn-primary rounded-pill px-4 me-3" href="">Read More</a>
                    <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="/img/about.jpg">
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Newsletter Start -->
<div class="container-xxl bg-primary newsletter my-5 wow fadeInUp overflow-hidden" data-wow-delay="0.1s">
    <div class="container px-lg-5">
        <div class="row align-items-center" style="height: 250px;">
            <div class="col-12 col-md-6">
                <h3 class="text-white">Ready to get started</h3>
                <small class="text-white">Diam elitr est dolore at sanctus nonumy.</small>
                <div class="position-relative w-100 mt-3">
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                        placeholder="Enter Your Email" style="height: 48px;">
                    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                            class="fa fa-paper-plane text-primary fs-4"></i></button>
                </div>
            </div>
            <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                <img class="img-fluid mt-5" style="height: 250px;" src="img/newsletter.png">
            </div>
        </div>
    </div>
</div>
<!-- Newsletter End -->


<!-- Team Start -->
<div class="container-xxl py-5 overflow-hidden">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Team</h6>
            <h2 class="mt-2">Meet Our Team Members</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="d-flex">
                        <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                        <img class="img-fluid rounded w-75" src="img/team-1.jpg" alt="">
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="fw-bold m-0">Jhon Doe</h5>
                        <small>CEO</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <div class="d-flex">
                        <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                        <img class="img-fluid rounded w-75" src="img/team-2.jpg" alt="">
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="fw-bold m-0">Emma William</h5>
                        <small>Manager</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="d-flex">
                        <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                        <img class="img-fluid rounded w-75" src="img/team-3.jpg" alt="">
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="fw-bold m-0">Noah Michael</h5>
                        <small>Designer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
@endsection