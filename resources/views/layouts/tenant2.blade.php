<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name' , 'Dashboard') }} | Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.ico') }}" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->

        <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link href="{{ asset('backend/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/libs/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/fonts/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/datatables/css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/vendor/datatables/css/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/vendor/datatables/css/select.bootstrap4.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/vendor/datatables/css/fixedHeader.bootstrap4.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/plugins/toastr.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/plugins/sweetalerts.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/plugins/icons/bootstrap-icons.css') }}" rel="stylesheet">

        @livewireStyles
    </head>

    <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed
    aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                    <!--begin::Brand-->
                    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                        <!--begin::Logo-->
                        <a href="{{ route('tenant.dashboard') }}">
                            <img alt="Logo" src="{{ asset('frontend/images/logo.png') }}" class="h-50px logo" />
                        </a>
                        <!--end::Logo-->
                        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                                <span class="svg-icon svg-icon-1 rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                                        </g>
                                    </svg>
                                </span>
                        </div>
                    </div>
                    <!--end::Brand-->
                    <!--begin::Aside menu-->
                    <div class="aside-menu flex-column-fluid">
                        <!--begin::Aside Menu-->
                        <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('tenant.dashboard') }}">
                                            <span class="menu-icon">
                                                <i class="bi bi-house fs-3"></i>
                                            </span>
                                        <span class="menu-title">Dashboard</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('homepage') }}" target="_blank">
                                            <span class="menu-icon">
                                                <i class="bi bi-app-indicator fs-3"></i>
                                            </span>
                                        <span class="menu-title">Westpoint Home</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Tenancy</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('tenant.lease') }}">
                                            <span class="menu-icon">
                                                <i class="bi bi-house fs-3"></i>
                                            </span>
                                        <span class="menu-title">My Lease</span>
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('tenant.invoices') }}">
                                            <span class="menu-icon">
                                                <i class="bi bi-credit-card fs-3"></i>
                                            </span>
                                        <span class="menu-title">My Invoices</span>
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('tenant.payments') }}">
                                        <span class="menu-icon">
                                            <i class="bi bi-credit-card fs-3"></i>
                                        </span>
                                        <span class="menu-title">My Payments</span>
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('tenant.communications') }}">
                                        <span class="menu-icon">
                                            <i class="bi-chat-left fs-3"></i>
                                        </span>
                                        <span class="menu-title">Communications</span>
                                    </a>
                                </div>

                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Support</span>
                                    </div>
                                </div>

                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                        <span class="menu-link">
                                            <span class="menu-icon">
                                                <i class="bi bi-people fs-3"></i>
                                            </span>
                                            <span class="menu-title">Support Center</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                                <span class="menu-link">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Tickets</span>
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <a class="menu-link" href="apps/support-center/tickets/list.html">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                        <span class="menu-title">Tickets List</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="apps/support-center/faq.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                <span class="menu-title">FAQ</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="apps/support-center/contact.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                <span class="menu-title">Contact Us</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Additional Pages</span>
                                    </div>
                                </div>

                                <div class="menu-item">
                                    <a class="menu-link" href="apps/calendar.html">
                                            <span class="menu-icon">
                                                <i class="bi bi-calendar3-event fs-3"></i>
                                            </span>
                                        <span class="menu-title">Calendar</span>
                                    </a>
                                </div>

                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-icon">
                                                <i class="bi-shield-check  fs-3"></i>
                                            </span>
                                            <span class="menu-title">Careers</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="apps/chat/private.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                <span class="menu-title">Careers List</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Aside menu-->
                </div>
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" style="" class="header align-items-stretch">
                        <!--begin::Container-->
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <!--begin::Aside mobile toggle-->
                            <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                                <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                                    <i class="bi bi-list fs-1"></i>
                                </div>
                            </div>
                            <!--end::Aside mobile toggle-->
                            <!--begin::Mobile logo-->
                            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                                <a href="{{ route('tenant.dashboard') }}" class="d-lg-none">
                                    <img alt="Logo" src="{{ asset('frontend/images/logo.png') }}" class="h-15px" />
                                </a>
                            </div>
                            <!--end::Mobile logo-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                                <!--begin::Navbar-->
                                <div class="d-flex align-items-stretch" id="kt_header_nav">
                                    <!--begin::Menu wrapper-->
                                    <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                        <!--begin::Menu-->
                                        <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                                            <div class="menu-item me-lg-1">
                                                <a class="menu-link active py-3" href="{{ route('tenant.dashboard') }}">
                                                    <span class="menu-title">Dashboard</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::Navbar-->
                                <!--begin::Topbar-->
                                <div class="d-flex align-items-stretch flex-shrink-0">
                                    <!--begin::Toolbar wrapper-->
                                    <div class="topbar d-flex align-items-stretch flex-shrink-0">
                                        <!--begin::User-->
                                        <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                                            <!--begin::Menu wrapper-->
                                            <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                                <img src="{{ asset('backend/media/avatars/avatar.svg') }}" alt="logo" />
                                            </div>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content d-flex align-items-center px-3">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-50px me-5">
                                                            <img alt="avatar" src="{{ asset('backend/media/avatars/avatar.svg') }}" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Username-->
                                                        <div class="d-flex flex-column">
                                                            <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->fname.' '.Auth::user()->lname }}
                                                                <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Verified Tenant</span></div>
                                                            <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                                        </div>
                                                        <!--end::Username-->
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="{{ route('tenant.settings') }}" class="menu-link px-5">My Profile</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5 my-1">
                                                    <a href="account/settings.html" class="menu-link px-5">Account Settings</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" class="menu-link px-5">Sign Out</a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                    </form>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                            <!--end::Menu wrapper-->
                                        </div>
                                        <!--end::User -->
                                        <!--begin::Heaeder menu toggle-->
                                        <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                                            <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                                                <i class="bi bi-text-left fs-1"></i>
                                            </div>
                                        </div>
                                        <!--end::Heaeder menu toggle-->
                                    </div>
                                    <!--end::Toolbar wrapper-->
                                </div>
                                <!--end::Topbar-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Toolbar-->
                        <div class="toolbar" id="kt_toolbar">
                            <!--begin::Container-->
                            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                                <!--begin::Page title-->
                                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                    <!--begin::Title-->
                                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard
                                        <!--begin::Separator-->
                                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                                        <!--end::Separator-->
                                        <!--begin::Description-->
                                        <small class="text-muted fs-7 fw-bold my-1 ms-1"> Hello <strong>{{ Auth::user()->fname.' '.Auth::user()->lname }}</strong>. You are logged in as a Tenant</small>
                                        <!--end::Description--></h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Toolbar-->

                    @yield('content')

                    <!--end::Content-->
                        <!--begin::Footer-->
                        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                            <!--begin::Container-->
                            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <!--begin::Copyright-->
                                <div class="text-dark order-2 order-md-1">
                                    <span class="text-muted fw-bold me-1">©2021</span>
                                    <a href="#{{ route('homepage') }}" target="_blank" class="text-gray-800 text-hover-primary">Westpoint Properties</a>
                                </div>
                                <!--end::Copyright-->
                                <!--begin::Menu-->
                                <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                                    <li class="menu-item">
                                        <a href="{{ route('about') }}" target="_blank" class="menu-link px-2">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('contact') }}" target="_blank" class="menu-link px-2">Support</a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link px-2 text-danger" href="#" data-toggle="modal" data-target="#notice">IMPORTANT</a>
                                    </li>
                                </ul>
                                <!--end::Menu-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Page-->
            </div>

            <div class="modal fade" id="notice" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalHeader">IMPORTANT NOTICE</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <ol>
                                <li>Please update your password.</li>
                                <li> Don't share your passwords with anyone else.</li>
                            </ol>
                        </div>
                        <div class="modal-footer"> <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a> </div>
                    </div>
                </div>
            </div>

            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                         version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                            <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                </span>
            </div>
        </div>

        <script src="{{asset('backend/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
        <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <script src="{{asset('backend/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{asset('backend/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
        <script src="{{asset('backend/libs/js/main-js.js') }}"></script>

        <script src="{{ asset('backend/vendor/datatables-js/dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/buttons.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/jszip.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/dataTables.rowGroup.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables-js/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{asset('backend/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{asset('backend/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{asset('backend/vendor/datatables/js/data-table.js') }}"></script>

        <script src="{{ asset('backend/plugins/sweetalert2.all.min.js') }}"></script>
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('backend/plugins/icons/bootstrap-icons.js') }}"></script>
        <script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->

        <!--begin::Page Vendors Javascript(used by this page)-->
        <script src="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
        <!--end::Page Vendors Javascript-->

        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('backend/js/custom/apps/calendar/calendar.js') }}"></script>
        <script src="{{ asset('backend/js/custom/account/settings/deactivate-account.js') }}"></script>
        <script src="{{ asset('backend/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('backend/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('backend/js/custom/modals/create-app.js') }}"></script>
        <script src="{{ asset('backend/js/custom/modals/upgrade-plan.js') }}"></script>
        <script src="{{ asset('backend/js/custom/intro.js') }}"></script>
        <!--end::Page Custom Javascript-->

        @yield('scripts')

        {{-- @include('partials.toastr') --}}

        @include('partials.sweetalerts')

        <script>
            window.onload = displayClock();
            function displayClock(){
                document.querySelector('#clock').innerHTML = new Date().toLocaleTimeString();
                setTimeout(displayClock, 1000);
            }
        </script>
    </body>
</html>
