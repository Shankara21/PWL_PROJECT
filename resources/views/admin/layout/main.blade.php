<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>GO Rent Dashboard - {{ $title }}</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('admin/images/favicon.png')}}">
	<link href="{{asset('admin/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link href="{{asset('admin/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('admin/vendor/nouislider/nouislider.min.css')}}">

	<link rel="icon" href="{{ asset('img/icon.png') }}">

	<!-- Datatable -->
	<link href="{{asset('admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<!-- Custom Stylesheet -->
	<link href="{{asset('admin/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">

	{{-- Trix Editor --}}
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/trix.css')}}">
	<script type="text/javascript" src="{{asset('admin/js/trix.js')}}"></script>

	<!-- Style css -->
	<link href="{{asset('admin/css/style.css')}}" rel="stylesheet">


</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		@include('admin.layout.topbar')

		@include('admin.layout.sidebar')

		@yield('content')




		@include('admin.layout.footer')

		<!--**********************************
           Support ticket button start
        ***********************************-->

		<!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="{{asset('admin/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('admin/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

	<!-- Apex Chart -->
	<script src="{{asset('admin/vendor/apexchart/apexchart.js')}}"></script>

	<script src="{{asset('admin/vendor/chart.js/Chart.bundle.min.js')}}"></script>

	<!-- Chart piety plugin files -->
	<script src="{{asset('admin/vendor/peity/jquery.peity.min.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{asset('admin/js/dashboard/dashboard-1.js')}}"></script>

	<script src="{{asset('admin/vendor/owl-carousel/owl.carousel.js')}}"></script>

	<!-- Datatable -->
	<script src="{{asset('admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('admin/js/plugins-init/datatables.init.js')}}"></script>

	<script src="{{asset('admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

	<script src="{{asset('admin/js/custom.min.js')}}"></script>
	<script src="{{asset('admin/js/dlabnav-init.js')}}"></script>
	<script src="{{asset('admin/js/demo.js')}}"></script>
	<script src="{{asset('admin/js/styleSwitcher.js')}}"></script>

    {{-- SweetAlert --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @yield('sweetAlert')
	<script>
		function cardsCenter()
		{

			/*  testimonial one function by = owl.carousel.js */



			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},
					800:{
						items:1
					},
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}

		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000);
		});

	</script>

</body>

</html>
