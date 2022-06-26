<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Go Rent - {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('homepage/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}"> --}}
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}"> --}}
    <link href="/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('lib/lightbox/css/lightbox.min.css') }}"> --}}

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <link rel="icon" href="/img/icon.png">
    {{-- <link rel="stylesheet" href="{{ asset('fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css') }}">
    --}}

</head>

<body>
    <div class="container-xxl bg-white p-0">


        <!-- Navbar & Hero Start -->
        @include('homepage.layouts.navbar')
        <!-- Navbar & Hero End -->





        <!-- Main Content Start -->
        @yield('content')
        <!-- Main Content End -->



        @include('sweetalert::alert')
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
        <!-- Footer Start -->
        @include('homepage.layouts.footer')
        <!-- Footer End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script> --}}
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
    <!-- Template Javascript -->
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('sweetAlert')
</body>

</html>