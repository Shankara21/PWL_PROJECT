<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="/" class="navbar-brand p-0">
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
                <a href="/project"
                    class="nav-item nav-link {{ Request::is('project') || Request::is('detail/{kendaraan}') ? 'active' : '' }}">Kendaraan</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::is('contact')? 'active' : '' }}"
                        data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="/team" class="dropdown-item"><i class="fas fa-user-friends"></i> Our Team</a>
                        <a href="/testimonial" class="dropdown-item"><i class="fas fa-thumbs-up"></i> Testimonial</a>
                        <a href="/contact" class="dropdown-item {{ Request::is('contact') ? 'active' : '' }}"><i
                                class="fas fa-envelope"></i> Contact</a>
                    </div>
                </div>

            </div>
            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Sign
                In</a>
            <a href="{{ route('register') }}" class="btn btn-light text-dark rounded-pill py-2 px-4 ms-3">Sign
                Up</a>
            @endif
            @else
            @php
            $order = \App\Models\Order::where('user_id', Auth::user()->id) -> where('status', 0) -> first();
            // dd($order);
            if ($order) {
            $notifications = \App\Models\OrderDetail::where('order_id', $order -> id)->count();
            }else{
            $notifications = '';
            }
            @endphp
            @if (Auth::user()->level == 'admin')
            <div class="navbar-nav">
                <a href="/cart" class="nav-item nav-link"><i class="fas fa-shopping-cart" style="font-size: 1.5em"></i>
                    {{-- @if ($orderDetails != null) --}}
                    @if ($notifications)
                    <span class="badge bg-danger"
                        style="transform: translateY(-20px);padding: 3px 6px;border-radius: 30px">
                        {{ $notifications }}
                    </span>
                    @else
                    <span></span>
                    @endif
                    {{-- @else
                    @endif --}}
                </a>
            </div>
            <div class="dropdown text-end navbar-nav">
                <a href="#" class="d-block link-dark text-decoration-none dropdown nav-item nav-link" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span>{{Auth::user()->username}}</span>
                    {{-- <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> --}}
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1"
                    style="transform: translateX(-3em)">
                    <li><a class="dropdown-item" href="/profile"><i class="fas fa-home"></i> Profile</a>
                    <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><i
                                class="fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
            @endif


            @if (Auth::user()->level == 'user')
            <div class="navbar-nav">
                <a href="/cart" class="nav-item nav-link"><i class="fas fa-shopping-cart" style="font-size: 1.5em"></i>
                    @if (!empty($orderDetails))
                    <span class="badge bg-danger"
                        style="transform: translateY(-20px);padding: 3px 6px;border-radius: 30px">
                        {{ $notifications }}
                    </span>
                    @else
                    @endif
                </a>
            </div>
            <div class="dropdown text-end navbar-nav">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle nav-item nav-link"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>{{Auth::user()->name}}</span>
                    {{-- <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> --}}
                </a>
                <ul class="dropdown-menu text-small" style="transform: translateX(-3em)"
                    aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="/Profile"><i class="fas fa-home"></i> Profile</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>

                    </li>
                </ul>
            </div>
            @endif

            @endguest



        </div>
    </nav>


</div>