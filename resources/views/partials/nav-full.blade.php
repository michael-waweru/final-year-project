<header class="header transparent scroll-hide">
    <!--Header Top Section Starts-->
    <div class="header-top-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-8 col-12">
                    <div class="header-top-left">
                        <ul>
                            <li><i class="fa fa-phone"></i> <a href="tel:+254 713 672 772">+254 713 672 772</a></li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:info@westpoint.com">info@westpoint.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-12">
                    <div class="menu-btn">
                        @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->role == 1)
                                    <ul class="user-btn">
                                        <li>
                                            <a href="{{ route('admin.dashboard') }}">
                                                <i class="lnr lnr-user"></i>
                                            </a>
                                        </li>
                                    </ul>
                                @elseif (Auth::user()->role == 2)
                                    <ul class="user-btn">
                                        <li>
                                            <a href="{{ route('landlord.dashboard') }}">
                                                <i class="lnr lnr-user"></i>
                                            </a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="user-btn">
                                        <li>
                                            <a href="{{ route('user.dashboard') }}">
                                                <i class="lnr lnr-user"></i>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @else
                                <ul class="user-btn">
                                    <li>
                                        <a href="{{ route('login') }}">
                                            <i class="lnr lnr-user mr-2"></i>Login
                                        </a>
                                    </li>
                                </ul>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Header Top Section Ends-->
    <!--Main Menu starts-->
    <div class="site-navbar-wrap v2">
        <div class="container">
            <div class="site-navbar">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-6 col-7">
                        <a class="navbar-brand" href="/"><img src="{{  asset('frontend/images/logo.png') }}" alt="logo" class="img-fluid"></a>
                    </div>
                    <div class="col-lg-6 col-md-1 col-1  order-2 order-lg-1 pl-xs-0">
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
                                    <li>
                                        <a href="#" disabled>News</a>
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
                                                    <a class="btn v3" href="{{ route('user.dashboard') }}">
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
                    <div class="col-lg-4 col-md-5 col-4 order-1 order-lg-2 text-right pr-xs-0">
                        <div class="menu-btn">
                            <div class="add-list">
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
                                            <a class="btn v3" href="{{ route('user.dashboard') }}">
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
