<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-search me-2"></i>GO<span class="fs-5">Rent</span></h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                <a href="/about" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                <a href="/service" class="nav-item nav-link {{ Request::is('service') ? 'active' : '' }}">Service</a>
                <a href="/project" class="nav-item nav-link {{ Request::is('project') ? 'active' : '' }}">Kendaraan</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="/team" class="dropdown-item">Our Team</a>
                        <a href="/testimonial" class="dropdown-item">Testimonial</a>
                        <a href="404" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="/contact" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
            </div>
            <a href="https://htmlcodex.com/startup-company-website-template"
                class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Pro Version</a>
        </div>
    </nav>


</div>