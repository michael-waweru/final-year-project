@extends('layouts.landlord2')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Invoice 2 main-->
            <div class="card">
                <div class="section-block p-10">
                    <h3 class="section-title text-capitalize">Memo # {{ $memo->id }}
                        <button onclick="window.close('_self')" class="btn btn-sm btn-success float-end">Close</button>
                    </h3>
                </div>
                <!--begin::Body-->
                <div class="card-body p-lg-20">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                            <!--begin::Invoice 2 content-->
                            <div class="mt-n1">
                                <!--begin::Top-->
                                <div class="d-flex flex-stack pb-10">
                                    <!--begin::Logo-->
                                    <img alt="Logo" src="{{ asset('frontend/images/logo.png') }}" />
                                    <!--end::Logo-->
                                    <div class="fw-bold fs-7 text-gray-600 mb-1">Issue Date:
                                        <div class="fw-bolder fs-6 text-gray-800">{{ $memo->created_at->format('d-m-y') }}</div>                                            <!--end::Col-->
                                    </div>
                                </div>
                                <!--end::Top-->
                                <!--begin::Wrapper-->
                                <div class="m-0">
                                    <div class="row g-5 mb-12">
                                        <div class="col-md-12 pl-0 text-monospace">
                                            <h6 class="mb-5 fw-boldest text-center text-uppercase text-decoration-underline text-hover-primary mt-5" style="font-size: 2em;">
                                                {{ $memo->title }}
                                            </h6>
                                            {{ $memo->description }}
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <label class="col-form-label">By:</label>
                                        {{ $memo->landlord->fname.' '.$memo->landlord->lname }}
                                    </div>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Invoice 2 content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                    <div class="mt-4">
                        <p class="text-center">NOTE : This is computer generated memo and does not require a physical signature.</p>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Invoice 2 main-->
        </div>
    </div>
@endsection
