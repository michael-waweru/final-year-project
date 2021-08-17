<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Account</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('tenant.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Account</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Settings</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ asset('backend/media/avatars/avatar.svg') }}" alt="image" />
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ Auth::user()->fname.' '.Auth::user()->lname  }}</span>
                                        <span>
                                            <!--begin::Svg Icon | path: icons/duotone/Design/Verified.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                                    <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3">Verified Tenant</span>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <span class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                            </span>Tenant
                                        </span>

                                        <span class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <!--begin::Svg Icon | path: icons/duotone/Communication/Mail-at.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <path d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z" fill="#000000" />
                                            </svg>
                                        </span>
                                            <!--end::Svg Icon-->{{ Auth::user()->email }}</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <div class="d-flex overflow-auto h-55px">
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary me-6" href="{{ route('tenant.settings') }}">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary me-6 active" href="{{ route('tenant.change-password') }}">Account Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--begin::Sign-in Method-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Sign-in Method</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Content-->
                <div class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9 ">
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <path d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z" fill="#000000" opacity="0.3" />
                                    <path d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z" fill="#000000" />
                                </svg>
                            </span>
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-600">
                                        Update your Password. Remember, your login credentials are used to secure your account from unauthorized
                                        access. Don't share your Auth details with other people to prevent alterations in your dashboard and or
                                        billing information.
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form wire:submit.prevent="changePassword">
                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Current Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid @error('current_password') is-invalid @enderror"
                                               name="current_password" id="currentpassword" wire:model="current_password" />
                                    </div>
                                    @error('current_password') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">New Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                               name="password" id="newpassword"  wire:model="password"/>
                                    </div>
                                    @error('password') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid @error('current_password') is-invalid @enderror"
                                               name="password_confirmation" wire:model="password_confirmation" />
                                    </div>
                                    @error('password_confirmation') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                            <div class="d-flex">
                                <input type="submit" class="btn btn-primary me-2 px-6" value="Update Password">
                            </div>
                        </form>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Sign-in Method-->

            <!--begin::Notifications-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Notifications</h3>
                    </div>
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_notifications" class="collapse show">
                    <!--begin::Form-->
                    <form class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top px-9 pt-3 pb-4">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                                    <tbody class="fs-6 fw-bold">
                                    <!--begin::Table row-->
                                    <tr>
                                        <td class="min-w-250px fs-4 fw-bolder">Notifications</td>
                                        <td class="w-125px">
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_email" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=email]" />
                                                <label class="form-check-label ps-2" for="kt_settings_notification_email">Dashboard</label>
                                            </div>
                                        </td>
                                        <td class="w-125px">
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_phone" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=phone]" />
                                                <label class="form-check-label ps-2" for="kt_settings_notification_phone">Phone</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--begin::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <td>Invoice Updates</td>
                                        <td>
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" id="billing1" checked="checked" data-kt-settings-notification="email" />
                                                <label class="form-check-label ps-2" for="billing1"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="billing2" checked="checked" data-kt-settings-notification="phone" />
                                                <label class="form-check-label ps-2" for="billing2"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--begin::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <td>New Neighbors</td>
                                        <td>
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="team1" checked="checked" data-kt-settings-notification="email" />
                                                <label class="form-check-label ps-2" for="team1"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="team2" data-kt-settings-notification="phone" />
                                                <label class="form-check-label ps-2" for="team2"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--begin::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <td>New Communique from Administration</td>
                                        <td>
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="project1" data-kt-settings-notification="email" />
                                                <label class="form-check-label ps-2" for="project1"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="project2" checked="checked" data-kt-settings-notification="phone" />
                                                <label class="form-check-label ps-2" for="project2"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--begin::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <td class="border-bottom-0">Newsletters</td>
                                        <td class="border-bottom-0">
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" checked="checked" id="newsletter1" data-kt-settings-notification="email" />
                                                <label class="form-check-label ps-2" for="newsletter1"></label>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="form-check form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="newsletter2" data-kt-settings-notification="phone" />
                                                <label class="form-check-label ps-2" for="newsletter2"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--begin::Table row-->
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button class="btn btn-white btn-active-light-primary me-2">Discard</button>
                            <button class="btn btn-primary px-6">Save Changes</button>
                        </div>
                        <!--end::Card footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Notifications-->
            <!--begin::Deactivate Account-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Deactivate Your Account</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Content-->
                <div id="kt_account_deactivate" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_deactivate_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                <!--begin::Icon-->
                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                        <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                                        <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                                    </svg>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-bold">
                                        <h4 class="text-gray-800 fw-bolder">Danger Zone!</h4>
                                        <div class="fs-6 text-gray-600">
                                            Beware. If your account is deactivated, you cannot access your user dashboard. We strongly advice resident
                                            tenants not to request a deactivation while still in the property.
                                        </div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                            <!--begin::Form input row-->
                            <div class="form-check form-check-solid fv-row">
                                <input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />
                                <label class="form-check-label fw-bold ps-2 fs-6" for="deactivate">I confirm that I want a deactivation of my account</label>
                            </div>
                            <!--end::Form input row-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button id="deactivate" type="submit" class="btn btn-danger fw-bold">Request Deactivation</button>
                        </div>
                        <!--end::Card footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Deactivate Account-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
