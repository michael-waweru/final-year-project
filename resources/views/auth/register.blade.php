
<!doctype html>
<html class="no-js" lang="EN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Westpoint | Register</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link href="{{ asset('frontend/images/favicon.ico') }}" rel="icon" type="image/png"/>
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
                        <h2 class="sub-title">Westpoint Dashboard</h2>
                        <p>
                           Please register here so as to access the dashboard. Remember, keep your credentials private.
                           Don't share your login information with other users.
                        </p>
                    </div>
                </div>
                <div class="fxt-bg-color">
                    <div class="fxt-header">
                        <a href="{{ route('homepage') }}" class="fxt-logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="login-logo"></a>
                        <div class="fxt-page-switcher">
                            <a href="{{ route('login') }}" class="switcher-text switcher-text1">Log In</a>
                            <a href="{{ route('register') }}" class="switcher-text switcher-text2 active">Register</a>
                        </div>
                    </div>
                    <div class="fxt-form mt-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group fxt-transformY-50 fxt-transition-delay-1">
                                <input type="text" id="fname" class="form-control @error('firstName') is-invalid @enderror" name="fname" placeholder="First Name" value="{{ old('fname') }}" autocomplete="name">
                                <i class="flaticon-user"></i>
                                @error('firstName') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                            </div>

                            <div class="form-group fxt-transformY-50 fxt-transition-delay-1">
                                <input type="text" id="lname" class="form-control @error('lastName') is-invalid @enderror" name="lname" placeholder="Last Name" value="{{ old('lname') }}" autocomplete="name">
                                <i class="flaticon-user"></i>
                                @error('lastName') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="form-group fxt-transformY-50 fxt-transition-delay-2">
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email" value="{{ old('email') }}" autocomplete="email">
                                <i class="flaticon-envelope"></i>
                                @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="form-group fxt-transformY-50 fxt-transition-delay-3">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password">
                                <i class="flaticon-padlock"></i>
                                @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="form-group fxt-transformY-50 fxt-transition-delay-3">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                                <i class="flaticon-padlock"></i>
                            </div>

                            <div class="form-group fxt-transformY-50 fxt-transition-delay-4">
                                <div class="fxt-content-between">
                                    <button type="submit" class="fxt-btn-fill">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="fxt-footer">
                        <ul class="fxt-socials">
                            <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-5"><a href="javascript:void(0)" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-6"><a href="javascript:void(0)" title="twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="fxt-google fxt-transformY-50 fxt-transition-delay-7"><a href="javascript:void(0)" title="google"><i class="fab fa-google-plus-g"></i></a></li>
                            <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-8"><a href="javascript:void(0)" title="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
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
