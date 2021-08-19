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
                                    <div class="fw-bolder fs-3 text-gray-800 mb-8">Invoice #{{ $invoice->id }}</div>
                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row g-5 mb-11">
                                        <!--end::Col-->
                                        <div class="col-sm-6">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">Issue Date:</div>
                                            <!--end::Label-->
                                            <!--end::Col-->
                                            <div class="fw-bolder fs-6 text-gray-800">{{ $invoice->created_at->format('d-m-y') }}</div>
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
                                                <span class="pe-2">{{ $invoice->invoice->payment_date->format('d-m-y') }}</span>
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
                                                    <th class="min-w-70px text-end pb-2">Paid</th>
                                                    <th class="min-w-100px text-end pb-2">Rent Amount</th>
                                                    <th class="min-w-80px text-end pb-2">Balance</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center pt-6"> {{ $invoice->invoice->type }}</td>
                                                    <td class="pt-6">Ksh {{ $invoice->amount }}</td>
                                                    <td class="pt-6">Ksh {{ $invoice->invoice->amount }}</td>
                                                    @if($invoice->balance != 0)
                                                        <td class="pt-6 text-danger fw-boldest">Ksh {{ $invoice->balance }}</td>
                                                        @else
                                                        <td class="pt-6 text-success fw-boldest">Ksh {{ $invoice->balance }}</td>
                                                    @endif
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
                                <h6 class="mb-8 fw-boldest text-gray-800 text-hover-primary mt-5" style="font-size: 2em;">PAYMENT OPTIONS</h6>
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
                                <div class="mb-6">
                                    <div class="fw-bold text-gray-600 fs-7">M-PESA:</div>
                                    <div class="fw-bolder text-gray-800 fs-6">PAYBILL No. : 4482 1482 <br>
                                        <div class="fw-bolder text-gray-800 fs-6">Confirmation Name: {{ $invoice->landlord->fname.' '.$invoice->landlord->lname }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="fw-bold text-gray-600 fs-7">CASH:</div>
                                    <div class="fw-bolder text-gray-800 fs-6">Pay your invoiced amount directly to<br>
                                        <div class="fw-bolder text-gray-800 fs-6">{{ $invoice->landlord->fname.' '.$invoice->landlord->lname }}</div>
                                    </div>
                                </div>
                                <!--begin::Item-->
                                <div class="mb-2">
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
                                    <div class="d-flex flex-stack flex-wrap mt-lg-20">
                                        <!-- begin::Actions-->
                                        <div class="my-1 me-5">
                                            <!-- begin::Pint-->
                                            <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">Print Invoice</button>
                                            <!-- end::Pint-->

                                            @if($invoice->balance != 0)
                                                <a class="menu-link px-2 text-danger" href="#" data-toggle="modal" data-target="#notice">
                                                    <button type="button" class="btn btn-success my-1">Receipt</button>
                                                </a>
                                                @elseif($invoice->balance === 0)
                                                <a href="{{ route('tenant.receipt.show', $invoice->id) }}">
                                                    <button type="button" class="btn btn-success my-1">Receipt</button>
                                                </a>
                                            @endif
                                            <div class="modal fade" id="notice" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalHeader">Hey {{ $invoice->tenant->fname.' '.$invoice->tenant->lname }}</h5>
                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-monospace">
                                                                Receipt is only generated upon rent competion. You still have a balance of Ksh.{{ $invoice->balance }}
                                                            </p>
                                                            <p>By Your Landlord {{ $invoice->landlord->fname.' '.$invoice->landlord->lname }}</p>
                                                        </div>
                                                        <div class="modal-footer"> <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end::Receipt-->
                                        </div>
                                        <!-- end::Actions-->
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
                <p class="text-center">NOTE : This is computer generated invoice and does not require physical signature.</p>
            </div>
            <!--end::Invoice 2 main-->
        </div>
    </div>

@endsection
