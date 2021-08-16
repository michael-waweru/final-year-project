<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>{{ config('app.name' , 'Dashboard') }} | Dashboard </title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
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

{{--        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">--}}
{{--        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">--}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css"> --}}


        <!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{ asset('backend/plugins/icons/bootstrap-icons.css') }}">
		<!--end::Global Stylesheets Bundle-->

        @livewireStyles

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body onload="startTime()" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed
    aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                    <!--begin::Brand-->
                    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                        <!--begin::Logo-->
                        <a href="{{ route('admin.dashboard') }}">
                            <img alt="Logo" src="{{ asset('frontend/images/logo.png') }}" class="h-60px logo" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Aside toggler-->
                        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
                            <span class="svg-icon svg-icon-1 rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Aside toggler-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Aside menu-->
                    <div class="aside-menu flex-column-fluid">
                        <!--begin::Aside Menu-->
                        <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('admin.dashboard') }}">
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
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Administration</span>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-people fs-3"></i>
                                        </span>
                                        <span class="menu-title">User Management</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Tenants</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{ route('admin.tenants') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Tenant List</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{ route('admin.tenant.add') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Add Tenant</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Landlords</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{ route('admin.landlords') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Landlord List</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{ route('admin.landlord.add') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Add Landlord</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-archive fs-3"></i>
                                        </span>
                                        <span class="menu-title">Property Management</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Properties</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{ route('admin.properties') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Property List</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{ route('admin.property.type') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Property Types</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Locations</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{ route('admin.locations') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Location List</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{ route('admin.location.add') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Add New Location</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-house fs-3"></i>
                                        </span>
                                        <span class="menu-title">Leases / Tenancy</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('admin.allocation') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Leases</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-hr fs-3"></i>
                                        </span>
                                        <span class="menu-title">Invoice Manager</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('admin.invoices.view') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                <span class="menu-title">Invoice List</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('admin.invoices') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                <span class="menu-title">Updated Invoices</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('admin.invoice.add') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Create Invoice</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-credit-card fs-3"></i>
                                        </span>
                                        <span class="menu-title">Payments</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('admin.payments') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Make Payment</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Additional Pages</span>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi bi-printer fs-3"></i>
                                        </span>
                                        <span class="menu-title">Reports</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="apps/customers/getting-started.html">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">View Reports</span>
                                            </a>
                                        </div>
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
                                                <div class="menu-item">
                                                    <a class="menu-link" href="apps/support-center/tickets/view.html">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">View Ticket</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="menu-icon">
                                            <i class="bi bi-calendar3-event fs-3"></i>
                                        </span>
                                        <span class="menu-title">Calendar</span>
                                    </a>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="bi-chat-left fs-3"></i>
                                        </span>
                                        <span class="menu-title">Chat</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="javascript:void()">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Chat</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="menu-item">
                                    <div class="menu-content">
                                        <div class="separator mx-1 my-4"></div>
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
                                <a href="{{ route('admin.dashboard') }}" class="d-lg-none">
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
                                                <a class="menu-link active py-3" href="{{ route('admin.dashboard') }}">
                                                    <span class="menu-title">Dashboard</span>
                                                </a>
                                            </div>

                                            <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                                                <span class="menu-link py-3">
                                                    <span class="menu-title">Resources</span>
                                                    <span class="menu-arrow d-lg-none"></span>
                                                </span>
                                                <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3" href="javascript:void()" title="Check out over 200 in-house components, plugins and ready for use solutions" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                            <span class="menu-icon">
                                                                <i class="bi bi-grid fs-3"></i>
                                                            </span>
                                                            <span class="menu-title">Components</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3" href="javascript:void()" title="Coming up with a structure to store notes" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                            <span class="menu-icon">
                                                                <i class="bi bi-box fs-3"></i>
                                                            </span>
                                                            <span class="menu-title">Notes</span>
                                                        </a>
                                                    </div>
                                                </div>
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
                                        <!--begin::Quick links-->
                                        <div class="d-flex align-items-stretch">
                                            <!--begin::Menu wrapper-->
                                            <div class="topbar-item px-3 px-lg-5" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                                <i class="bi bi-bar-chart fs-3"></i>
                                            </div>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('/assets/media/misc/pattern-1.jpg')">
                                                    <!--begin::Title-->
                                                    <h3 class="text-white fw-bold mb-3">Quick Links</h3>
                                                    <!--end::Title-->
                                                    <!--begin::Status-->
                                                    <span class="badge bg-primary py-2 px-3">25 pending tasks</span>
                                                    <!--end::Status-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin:Nav-->
                                                <div class="row g-0">
                                                    <!--begin:Item-->
                                                    <div class="col-6">
                                                        <a href="pages/projects/budget.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                                            <!--begin::Svg Icon | path: icons/duotone/Shopping/Euro.svg-->
                                                            <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
                                                                        <path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <span class="fs-5 fw-bold text-gray-800 mb-0">Accounting</span>
                                                            <span class="fs-7 text-gray-400">eCommerce</span>
                                                        </a>
                                                    </div>
                                                    <!--end:Item-->
                                                    <!--begin:Item-->
                                                    <div class="col-6">
                                                        <a href="pages/projects/settings.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
                                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Mail-attachment.svg-->
                                                            <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" fill="#000000" opacity="0.3" />
                                                                    <path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" fill="#000000" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <span class="fs-5 fw-bold text-gray-800 mb-0">Administration</span>
                                                            <span class="fs-7 text-gray-400">Console</span>
                                                        </a>
                                                    </div>
                                                    <!--end:Item-->
                                                    <!--begin:Item-->
                                                    <div class="col-6">
                                                        <a href="pages/projects/list.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                                                            <!--begin::Svg Icon | path: icons/duotone/Shopping/Box2.svg-->
                                                            <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
                                                                        <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <span class="fs-5 fw-bold text-gray-800 mb-0">Projects</span>
                                                            <span class="fs-7 text-gray-400">Pending Tasks</span>
                                                        </a>
                                                    </div>
                                                    <!--end:Item-->
                                                    <!--begin:Item-->
                                                    <div class="col-6">
                                                        <a href="pages/projects/users.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
                                                            <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <span class="fs-5 fw-bold text-gray-800 mb-0">Customers</span>
                                                            <span class="fs-7 text-gray-400">Latest cases</span>
                                                        </a>
                                                    </div>
                                                    <!--end:Item-->
                                                </div>
                                                <!--end:Nav-->
                                                <!--begin::View more-->
                                                <div class="py-2 text-center border-top">
                                                    <a href="pages/profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">View All
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                                    <span class="svg-icon svg-icon-5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon--></a>
                                                </div>
                                                <!--end::View more-->
                                            </div>
                                            <!--end::Menu-->
                                            <!--end::Menu wrapper-->
                                        </div>
                                        <!--end::Quick links-->
                                        <!--begin::Chat-->
                                        <div class="d-flex align-items-stretch">
                                            <!--begin::Menu wrapper-->
                                            <div class="topbar-item position-relative px-3 px-lg-5" id="kt_drawer_chat_toggle">
                                                <i class="bi bi-chat-left-text fs-3"></i>
                                            </div>
                                            <!--end::Menu wrapper-->
                                        </div>
                                        <!--end::Chat-->
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
                                                                <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Verified Admin ({{ Auth::user()->id  }})</span>
                                                            </div>
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
                                                    <a href="account/overview.html" class="menu-link px-5">My Profile</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="pages/projects/list.html" class="menu-link px-5">
                                                        <span class="menu-text">Administration</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <span class="menu-link px-5">
                                                        <span class="menu-title position-relative">System Language
                                                        <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                                                        <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('backend/media/flags/united-states.svg') }}" alt="language-flag" /></span></span>
                                                    </span>
                                                </div>
                                                <!--end::Menu item-->
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
                                    </div>
                                    <!--end::Toolbar wrapper-->
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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

                                    <small class="text-muted fs-7 fw-bold my-1 ms-1">
                                        Hello <strong>{{ Auth::user()->fname.' '.Auth::user()->lname }}</strong>. You are logged in as an Admin
                                    </small>
                                    <!--end::Description--></h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Page title-->
                                <div class="d-flex align-items-center py-1">
                                    <!--begin::Wrapper-->
                                    <div class="me-4">
                                        <!--begin::Menu-->
                                            <small class="text-muted fs-7 fw-bold my-1 ms-1">
                                                {{-- Hello {{ Auth::user()->name }}. You are logged in as an Admin --}}
                                                {{ date('l').', '.date('d M, Y') }} | <span id="clock"></span>
                                            </small>

                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>

                        {{ $slot }}

                        <!--begin::Footer-->
                        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                            <!--begin::Container-->
                            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <!--begin::Copyright-->
                                <div class="text-dark order-2 order-md-1">
                                    <span class="text-muted fw-bold me-1">©2021</span>
                                    <a href="{{ route('homepage') }}" target="_blank" class="text-gray-800 text-hover-primary">Westpoint Properties</a>
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
        </div>

        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
            </span>
        </div>

        <!--begin::Javascript-->
        @livewireScripts

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

{{--        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
        <script src="{{asset('backend/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
{{--        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>--}}
        <script src="{{asset('backend/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{asset('backend/vendor/datatables/js/data-table.js') }}"></script>
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>--}}
{{--        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>--}}
{{--        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>--}}
{{--        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>--}}
{{--        <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>--}}
{{--        <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>--}}
{{--        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>--}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>         --}}

        <script src="{{ asset('backend/plugins/sweetalert2.all.min.js') }}"></script>
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>--}}

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
                var display = new Date().toLocaleTimeString();
                document.querySelector('#clock').innerHTML = display;
                setTimeout(displayClock, 1000);
            }
        </script>
	</body>
</html>
