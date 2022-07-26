@extends('homepage.layouts.main')

@section('content')
<div class="container-xxl py-5 bg-primary hero-header mb-5 overflow-hidden">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Our Team</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Team</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Team Start -->
<div class="container-xxl py-5 overflow-hidden">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Team</h6>
            <h2 class="mt-2">Meet Our Team Members</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
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
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
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
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
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