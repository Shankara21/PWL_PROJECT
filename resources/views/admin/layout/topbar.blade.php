<!--**********************************
            Nav header start
        ***********************************-->
<div class="nav-header">
	<a href="/dashboard" class="brand-logo">

		<div class="brand-title">
			<h2 class="d-inline"><i class="fas fa-search"></i></h2>
			<h2 class="d-inline">Go Rent.</h2>
		</div>
	</a>
	<div class="nav-control">
		<div class="hamburger">
			<span class="line"></span><span class="line"></span><span class="line"></span>
		</div>
	</div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Chat box start
        ***********************************-->

<!--**********************************
            Chat box End
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header border-bottom">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
						Dashboard
					</div>
				</div>
				<ul class="navbar-nav header-right">
					<li class="nav-item d-flex align-items-center">
						<div class="input-group search-area">
							<input type="text" class="form-control" placeholder="Search here...">
							<span class="input-group-text"><a href="javascript:void(0)"><i
										class="flaticon-381-search-2"></i></a></span>
						</div>
					</li>

					<li class="nav-item dropdown  header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<img src="@if (auth()->user()->image)
                            {{ asset('storage/'.auth()->user()->image) }}
                            @elseif(auth()->user()->gender == 'Perempuan')
                            {{ asset('img/woman.png') }}
                            @elseif(auth()->user()->gender == 'Laki-laki')
                            {{ asset('img/man.png') }}
                            @else
                            {{ asset('img/user.png') }}
                        @endif" width="56" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<a href="app-profile.html" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
									height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
								<span class="ms-2">Profile </span>
							</a>
							<a href="{{ route('logout') }}" class=" dropdown-item ai-icon" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
									height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round">
									<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
									<polyline points="16 17 21 12 16 7"></polyline>
									<line x1="21" y1="12" x2="9" y2="12"></line>
								</svg>
								<span class="ms-2">{{ __('Logout') }}</span>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->
