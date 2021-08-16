<!DOCTYPE html>
<html dir="ltr" lang="en-US">

    <head>
        <!-- Metas -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Links -->
        <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.ico') }}" />
        <!-- google fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
        <!-- Plugins CSS -->
        <link href="{{ asset('frontend/css/plugin.css') }}" rel="stylesheet" />
        <!-- style CSS -->
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
        <!-- Document Title -->
        <title>{{ config('app.name'), 'Westpoint' }} | @yield('title')</title>

        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">
        @livewireStyles
    </head>

    <body>
        <!--Preloader starts-->
        <div class="preloader js-preloader">
            <img src="{{  asset('frontend/images/preloader.gif') }}" alt="PRELOADER">
        </div>
        <!--Preloader ends-->

         <!--Page Wrapper starts-->
        <div class="page-wrapper">
            <!--header starts-->
            @include('partials.nav-full')
            <!--Header ends-->

            {{ $slot }}

            <!-- Scroll to top starts-->
            <span class="scrolltotop"><i class="lnr lnr-arrow-up"></i></span>
            <!-- Scroll to top ends-->
        </div>
        <!--Page Wrapper ends-->

        <!--Footer Starts-->
        <div class="footer-wrapper v1">
            <div class="footer-top-area">
                <div class="container">
                    <div class="row nav-folderized">
                        <div class="col-lg-4 col-md-12">
                            <div class="footer-logo">
                                <a href="/"> <img src="{{  asset('frontend/images/logo.png') }}" alt="logo"></a>
                                <div class="company-desc">
                                    <p>
                                       We are Westpoint. Helping landlords and tenants modernize the entire rental process.
                                    </p>
                                    <ul class="list footer-list mt-20">
                                        <li>
                                            <div class="contact-info">
                                                <div class="icon">
                                                    <i class="fa fa-map-marker-alt"></i>
                                                </div>
                                                <div class="text">13th Ave, Kasarani, NAIROBI</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="contact-info">
                                                <div class="icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="text">info@westpoint.com</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="contact-info">
                                                <div class="icon">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="text">+254 713 672 772</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 text-center sm-left">
                            <div class="footer-content nav">
                                <h2 class="title">Popular Searches</h2>
                                <ul class="list res-list">
                                    <li><a class="link-hov style2" href="javascript:void(0)">Property for Rent</a></li>
                                    <li><a class="link-hov style2" href="javascript:void(0)">Property for Sale</a></li>
                                    <li><a class="link-hov style2" href="javascript:void(0)">Condominium for Sale</a></li>
                                    <li><a class="link-hov style2" href="javascript:void(0)">Resale Properties</a></li>
                                    <li><a class="link-hov style2" href="javascript:void(0)">Recent Properties</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 text-center sm-left">
                            <div class="footer-content nav">
                                <h2 class="title">Quick Links</h2>
                                <ul class="list res-list">
                                    <li><a class="link-hov style2" href="{{ route('about') }}">About us</a></li>
                                    <li><a class="link-hov style2" href="{{ route('contact') }}">Contact us</a></li>
                                    <li><a class="link-hov style2" href="{{ route('property') }}">Our Properties</a></li>
                                    <li><a class="link-hov style2" href="{{ route('homepage') }}">Home</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="footer-content">
                                <h4 class="title">Subscribe</h4>
                                <div class="value-input-wrap newsletter">
                                    <form action="{{ route('subscribe') }}" method="POST">
                                        @csrf
                                        <label for="email">Email Address
                                            <input class="mr-5" type="email" id="email" placeholder="Your mail address ..." name="s_email" required>

                                            <button class="btn btn-dark" style="margin-left: 5px;" type="submit">Subscribe</button>
                                            @error('s_email') <p class="text-danger">{{ $message }}</p> @enderror
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8 offset-md-2">
                            <p>
                                ©westpoint 2021. All rights reserved. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('scripts')

        @include('partials.sweetalerts')

        <!--plugin js-->
        <script src="{{ asset('frontend/js/plugin.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

        <!--Main js-->
        <script src="{{ asset('frontend/js/main.js') }}"></script>
        <!--Scripts ends-->
        @livewireScripts
    </body>
</html>
