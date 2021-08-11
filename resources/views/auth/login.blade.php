{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!doctype html>
<html class="no-js" lang="EN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Westpoint | Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.ico') }}" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/logins/css/bootstrap.min.css') }}">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/logins/css/fontawesome-all.min.css') }}">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{ asset('backend/logins/font/flaticon.css') }}">
        <!-- Google Web Fonts -->
        <link href="https://fonts.googleapis.com/css89ea.css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('backend/logins/style.css') }}">
    </head>

    <body>
        <div id="wrapper" class="wrapper">
            <div class="fxt-template-animation fxt-template-layout5">
                <div class="fxt-bg-img fxt-none-767" data-bg-image="{{ asset('backend/logins/img/figure/bg5-l.jpg') }}">
                    <div class="fxt-intro">
                        <div class="sub-title">Welcome To</div>
                        <h2 class="sub-title">Westpoint Dashboard</h2 >
                        <p>
                           Plese login to access your dashboard.Remember, keep your credentials private.
                           Don't share your login information with other users.
                        </p>
                    </div>
                </div>
                <div class="fxt-bg-color">
                    <div class="fxt-header">
                        <a href="{{ route('homepage') }}" class="fxt-logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="login-logo"></a>
                        <div class="fxt-page-switcher">
                            <a href="{{ route('login') }}" class="switcher-text switcher-text1 active">Log In</a>
                            <a href="{{ route('register') }}" class="switcher-text switcher-text2">Register</a>
                        </div>
                    </div>
                    <div class="fxt-form">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group fxt-transformY-50 fxt-transition-delay-1">
                                <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" autocomplete="email" autofocus>
                                <i class="flaticon-envelope"></i>
                                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="form-group fxt-transformY-50 fxt-transition-delay-2">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password">
                                <i class="flaticon-padlock"></i>
                                @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="switcher-text3">Forgot Password</a>
                                @endif
                                </div>

                            <div class="form-group fxt-transformY-50 fxt-transition-delay-3">
                                <div class="fxt-content-between">
                                    <button type="submit" class="fxt-btn-fill">Log in</button>
                                    <div class="checkbox">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Keep me logged in</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="fxt-footer">
                        <ul class="fxt-socials">
                            <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-5"><a href="javascript:void()" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-6"><a href="javascript:void()" title="twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="fxt-google fxt-transformY-50 fxt-transition-delay-7"><a href="javascript:void()" title="google"><i class="fab fa-google-plus-g"></i></a></li>
                            <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-8"><a href="javascript:void()" title="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- jquery-->
        <script src="{{ asset('backend/logins/js/jquery-3.5.0.min.js') }}"></script>
        <!-- Popper js -->
        <script src="{{ asset('backend/logins/js/popper.min.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('backend/logins/js/bootstrap.min.js') }}"></script>
        <!-- Imagesloaded js -->
        <script src="{{ asset('backend/logins/js/imagesloaded.pkgd.min.js') }}"></script>
        <!-- Custom Js -->
        <script src="{{ asset('backend/logins/js/main.js') }}"></script>

    </body>
</html>
