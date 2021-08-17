<header class="header transparent scroll-hide">
    <!--Main Menu starts-->
    <div class="site-navbar-wrap v1">
        <div class="container">
            <div class="site-navbar">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-6 col-9 order-2 order-xl-1 order-lg-1 order-md-1">
                        <a class="navbar-brand" href="/"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo" class="img-fluid"></a>
                    </div>
                    <div class="col-lg-6 col-md-1 col-3  order-3 order-xl-2 order-lg-2 order-md-3 pl-xs-0">
                        <nav class="site-navigation text-right">
                            <div class="container">
                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">About</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('property') }}">Property Listing</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                    <li class="d-lg-none">
                                        @if (Route::has('login'))
                                            @auth
                                                @if (Auth::user()->role == 1)
                                                    <a class="btn v3" href="{{ route('admin.dashboard') }}">
                                                        <i class="lnr lnr-home"></i>Dashboard
                                                    </a>
                                                @elseif (Auth::user()->role == 2)
                                                    <a class="btn v3" href="{{ route('landlord.dashboard') }}">
                                                        <i class="lnr lnr-home"></i>Dashboard
                                                    </a>
                                                @else
                                                    <a class="btn v3" href="{{ route('tenant.dashboard') }}">
                                                        <i class="lnr lnr-home"></i>Dashboard
                                                    </a>
                                                @endif

                                                @else
                                                    <a class="btn v3" href="{{ route('login') }}">
                                                        <i class="lnr lnr-home"></i>Dashboard
                                                    </a>
                                            @endauth
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="d-lg-none sm-right">
                            <a href="#" class="mobile-bar js-menu-toggle">
                                <span class="lnr lnr-menu"></span>
                            </a>
                        </div>
                        <!--mobile-menu starts -->
                        <div class="site-mobile-menu">
                            <div class="site-mobile-menu-header">
                                <div class="site-mobile-menu-close  js-menu-toggle">
                                    <span class="lnr lnr-cross"></span> </div>
                            </div>
                            <div class="site-mobile-menu-body"></div>
                        </div>
                        <!--mobile-menu ends-->
                    </div>
                    <div class="col-lg-4 col-md-5 col-12 order-1 order-xl-3 order-lg-3 order-md-2 text-right pr-xs-0">
                        <div class="menu-btn">
                            <div class="add-list float-right ml-3">
                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->role == 1)
                                            <a class="btn v3" href="{{ route('admin.dashboard') }}">
                                                <i class="lnr lnr-home"></i>Dashboard
                                            </a>
                                        @elseif (Auth::user()->role == 2)
                                            <a class="btn v3" href="{{ route('landlord.dashboard') }}">
                                                <i class="lnr lnr-home"></i>Dashboard
                                            </a>
                                        @else
                                            <a class="btn v3" href="{{ route('tenant.dashboard') }}">
                                                <i class="lnr lnr-home"></i>Dashboard
                                            </a>
                                        @endif

                                        @else
                                            <a class="btn v3" href="{{ route('login') }}">
                                                <i class="lnr lnr-home"></i>Dashboard
                                            </a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Main Menu ends-->
</header>
