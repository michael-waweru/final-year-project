@extends('layouts.tenant2')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Invoice 2 main-->
            <div class="card">
                <div class="section-block p-10">
                    <h3 class="section-title text-capitalize">My Invoice
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
                                </div>
                                <!--end::Top-->
                                <!--begin::Wrapper-->
                                <div class="m-0">
                                    <!--begin::Label-->
                                    <div class="fw-bolder fs-3 text-gray-800 mb-8">Invoice #{{ $invoice->invoice_id }}</div>
                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row g-5 mb-11">
                                        <!--end::Col-->
                                        <div class="col-sm-6">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issue Date:</div>
                                            <!--end::Label-->
                                            <!--end::Col-->
                                            <div class="fw-bolder fs-6 text-gray-800">{{ $invoice->created_at->format('Y-m-d') }}</div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Due Date:</div>
                                            <!--end::Label-->
                                            <!--end::Info-->
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                                <span class="pe-2">{{ $invoice->invoice->payment_date->format('Y-m-d') }}</span>
                                                <span class="fs-7 text-danger d-flex align-items-center">
                                                <span class="bullet bullet-dot bg-danger me-2"></span>
                                                    Due in {{ ($invoice->invoice->payment_date->diffInDays()) - ($invoice->created_at->diffInDays(now())) }} days
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
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issue To:</div>
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
                                                    <th class="min-w-70px text-end pb-2">Paid</th>
                                                    <th class="min-w-80px text-end pb-2">Balance</th>
                                                    <th class="min-w-100px text-end pb-2">Rent Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center pt-6"> {{ $invoice->invoice->type }}</td>
                                                    <td class="pt-6">Ksh {{ $invoice->amount }}</td>
                                                    <td class="pt-6">Ksh {{ $invoice->balance }}</td>
                                                    <td class="pt-6 text-dark fw-boldest">Ksh {{ $invoice->invoice->amount }}</td>
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
                        <!--begin::Sidebar-->
                        <div class="m-0">
                            <!--begin::Invoice 2 sidebar-->
                            <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                                <!--begin::Labels-->
                                <div class="fw-bolder text-gray-800 fs-6">INVOICE STATUS:
                                    @if($invoice->amount === 0)
                                        <span class="badge badge-light-danger me-3">Unpaid</span>
                                    @elseif(($invoice->balance != 0) && ($invoice->balance < $invoice->invoice->amount))
                                        <span class="badge badge-light-warning me-3">Partially Paid</span>
                                    @elseif($invoice->balance === 0)
                                        <span class="badge badge-light-success me-3">Paid</span>
                                    @endif
                                </div>

                                <!--end::Labels-->
                                <!--begin::Title-->
                                <h6 class="mb-8 fw-boldest text-gray-800 text-hover-primary mt-5" style="font-size: 2em;">PAYMENT DETAILS</h6>
                                <!--end::Title-->
                                <!--begin::Item-->
                                <div class="mb-6">
                                    <div class="fw-bold text-gray-600 fs-7">Bank:</div>
                                    <div class="fw-bolder text-gray-800 fs-6">Co-Operative Bank <br>
                                        <div class="fw-bolder text-gray-800 fs-6">Branch: Nakuru
                                    </div>
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="mb-6">
                                    <div class="fw-bold text-gray-600 fs-7 mt-2">Account:</div>
                                    <div class="fw-bolder text-gray-800 fs-6">{{ $invoice->landlord->fname.' '.$invoice->landlord->lname }} </div>
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="mb-15">
                                    <div class="fw-bold text-gray-600 fs-7">Payment Term:</div>
                                    <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center">
                                        {{ ($invoice->invoice->payment_date->diffInWeeks()) - ($invoice->invoice->created_at->diffInWeeks()) }} Weeks
                                        <span class="fs-7 text-danger d-flex align-items-center">
                                        <span class="bullet bullet-dot bg-danger mx-2"></span>
                                            Due in {{ ($invoice->invoice->payment_date->diffInDays()) - ($invoice->created_at->diffInDays(now())) }} days
                                        </span>
                                    </div>
                                </div>
                                <!--end::Item-->
                                <div class="mb-6">
                                    <div class="fw-bold text-gray-600 fs-7">M-PESA:</div>
                                    <div class="fw-bolder text-gray-800 fs-6">0713 672 772 <br>
                                        <div class="fw-bolder text-gray-800 fs-6">Confirmation Name: {{ $invoice->landlord->fname.' '.$invoice->landlord->lname }}
                                        </div>
                                    </div>
                                </div>
                                    <div class="my-1 me-5">
                                        <!-- begin::Pint-->
                                        <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">Print Invoice</button>
                                        <!-- end::Pint-->
                                    </div>
                                    <!-- end::Actions-->
                                </div>
                            </div>
                            <!--end::Invoice 2 sidebar-->
                        </div>
                        <!--end::Sidebar-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Invoice 2 main-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
