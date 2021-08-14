@extends('layouts.admin2')

@section('content')

    <div class="post d-flex flex-column-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body p-12">
                            <!--begin::Form-->
                            <form action="{{ route('admin.invoice.store') }}" method="post">
                                @csrf
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start flex-xxl-row">
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice entry date">
                                        <!--begin::Date-->
                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap mr-5 mt-5">Date:</div>
                                        <!--end::Date-->
                                        <!--begin::Input-->
                                        <div class="position-relative d-flex align-items-center w-200px mt-4">
                                            <!--begin::Datepicker-->
                                            <input class="form-control fw-bolder pe-5" name="created_at" type="date" value="{{ date('Y-m-d') }}"/>
                                            <!--end::Datepicker-->
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
                                        <span class="fs-2x fw-bolder text-gray-800">Invoice #</span>
                                        <input type="number" class="form-control fw-bolder text-gray-400 fs-3 w-200px ml-2"
                                               name="serial" value="{{ $id = App\Models\Invoice::nextId() }}" class="form-control-flush" {{ $id ? 'disabled' : '' }}>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice due date">
                                        <!--begin::Date-->
                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap mr-1 mt-3">Due Date:</div>
                                        <!--end::Date-->
                                        <!--begin::Input-->
                                        <div class="position-relative d-flex align-items-center w-200px mt-4">
                                            <!--begin::Datepicker-->
                                            <input class="form-control fw-bolder pe-5" name="payment_date" type="date"/>
                                            <!--end::Datepicker-->
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-10"></div>
                                <!--end::Separator-->
                                <!--begin::Wrapper-->

                                <!--begin::Row-->
                                <div class="row gx-10 mb-5">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Invoice From</label>
                                        <div class="mb-5">
                                            <select class="form-select" name="entry_id" required>
                                                <option value="">Select Landlord</option>
                                                @foreach($landlords as $landlord)
                                                    <option value="{{ $landlord->id }}">{{ $landlord->fname.' '.$landlord->lname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Allocaion For Invoice</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select class="form-select" id="allocations" required>
                                                <option value="">Select Allocation For Billing</option>
                                                @foreach ($allocations as $allocation)
                                                    <option value="{{ $allocation->id }}">{{ $allocation->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->

                                <div id="allocation-info">
                                    <!--begin::Row-->
                                    <div class="row gx-10 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Property</label>
                                            <div class="mb-5">
                                                <div class="mb-5">
                                                    <input type="text" id="property" class="form-control form-control-solid" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Allocated Tenant</label>
                                            <div class="mb-5">
                                                <div class="mb-5">
                                                    <input id="tenant" type="text" class="form-control form-control-solid" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row gx-10 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Rent</label>
                                            <div class="mb-5">
                                                <div class="mb-5">
                                                    <input type="text" id="rent" class="form-control form-control-solid" name="amount" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->

                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Property Landlord</label>
                                            <div class="mb-5">
                                                <div class="mb-5">
                                                    <input id="landlord" name="landlord_id" type="text" class="form-control form-control-solid" disabled/>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>

                                    <div class="row gx-10 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Amount to be Paid</label>
                                            <div class="mb-5">
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="payment_amount" placeholder="Payment Amount" onkeyup="word2.innerHTML=toWord(this.value)"/>
                                                    <div class="border-bottom bg-light p-2 mt-3">In Word: <span class="text-danger" id="word2"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Invoiced To </label>
                                            <div class="mb-5">
                                                <select class="form-select" name="user_id" required>
                                                    <option value="">Select Tenant For Billing</option>
                                                    @foreach ($tenants as $tenant)
                                                        <option value="{{ $tenant->id }}">{{ $tenant->fname.' '.$tenant->lname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                <!--begin::Notes-->
                                <div class="mb-0">
                                    <label class="form-label fs-6 fw-bolder text-gray-700">Invoice Description</label>
                                    <textarea name="description" class="form-control form-control-solid" rows="3" placeholder="Description"></textarea>
                                </div>
                                <!--end::Notes-->
                                    <div class="mb-0">
                                        <button type="submit" class="btn btn-primary w-20 float-right mt-5">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077
                                                        13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996
                                                        C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5
                                                        L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764
                                                        4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087,
                                                        -9.191034)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            Send Invoice
                                        </button>
                                    </div>
                            </form>
                                <!--end::Wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Layout-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#allocation-info').slideUp();
        })

        // Get and show allocation information - payment
        $('#allocations').on('change', function() {
            var id = $(this).val();
            var url = '{{ url('api/allocation-info') }}?allocation=' + id;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data,status) {
                    $('#allocation-info').slideDown();
                    $('#property').val(data.property);
                    $('#tenant').val(data.tenant);
                    $('#rent').val(data.rent);
                    $('#landlord').val(data.landlord);
                }
            });
        });
    </script>
@endsection
