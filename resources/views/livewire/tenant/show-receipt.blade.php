@extends('layouts.tenant2')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Invoice 2 main-->
            <div class="card">
                <div class="section-block p-10">
                    <h3 class="section-title text-capitalize">Receipt
                        <button type="button" class="btn btn-success my-1 me-12 float-end" onclick="window.print();">Print Receipt</button>
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
                                </div>
                                <!--end::Top-->
                                <!--begin::Wrapper-->
                                <div class="m-0">
                                    <!--begin::Label-->
                                    <div class="fw-bolder fs-3 text-gray-800 mb-8">Invoice #{{ $invoice->id }}</div>
                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row g-5 mb-11">
                                        <!--end::Col-->
                                        <div class="col-sm-6">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issued Date:</div>
                                            <!--end::Label-->
                                            <!--end::Col-->
                                            <div class="fw-bolder fs-6 text-gray-800">{{ $invoice->created_at->format('d-m-y')  }}</div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Date Paid:</div>
                                            <!--end::Label-->
                                            <!--end::Info-->
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                                <span class="pe-2">{{ $invoice->created_at->format('d-m-y')   }}</span>
                                                <span class="fs-7 d-flex align-items-center">
                                                    <span class="bullet bullet-dot bg-success me-2"></span>
                                                        Status: <span class="badge badge-light-success me-3">Paid</span>
                                                </span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row g-5 mb-12">
                                        <!--end::Col-->
                                        <div class="col-sm-6">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issued To:</div>
                                            <!--end::Label-->
                                            <!--end::Text-->
                                            <div class="fw-bolder fs-6 text-gray-800">{{ $invoice->tenant->fname.' '.$invoice->tenant->lname }}</div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issued By:</div>
                                            <!--end::Label-->
                                            <!--end::Text-->
                                            <div class="fw-bolder fs-6 text-gray-800">{{ $invoice->landlord->fname.' '.$invoice->landlord->lname }}</div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Content-->
                                    <div class="flex-grow-1">
                                        <!--begin::Table-->
                                        <div class="table-responsive border-bottom mb-9">
                                            <table class="table mb-3">
                                                <thead>
                                                <tr class="border-bottom fs-6 fw-bolder text-gray-400">
                                                    <th class="min-w-175px pb-2">Issued For</th>
                                                    <th class="min-w-70px text-end pb-2">Paid Amount</th>
                                                    <th class="min-w-100px text-end pb-2">Rent Amount</th>
                                                    <th class="min-w-80px text-end pb-2">Balance</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center pt-6"> {{ $invoice->invoice->type }}</td>
                                                    <td class="pt-6">Ksh {{ $invoice->amount }}</td>
                                                    <td class="pt-6">Ksh {{ $invoice->invoice->amount }}</td>
                                                    <td class="pt-6 text-success fw-boldest">Ksh {{ $invoice->balance }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Invoice 2 content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Body-->
                <p class="text-center">NOTE : This is computer generated receipt and does not require physical signature.</p>
            </div>
            <!--end::Invoice 2 main-->
        </div>
    </div>
    <!--end::Container-->
@endsection
