@extends('layouts.admin2')

@section('content')
    <div>
        <div class="col-12">
            <div class="section-block">
                <h3 class="section-title">Invoices</h3>
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <a class="text-white" href="{{ route('admin.invoices.view') }}">
                            <button type="button" class="btn btn-primary">Created Invoices</button>
                        </a>
                    </div>
                    <!--end::Toolbar-->
                </div>
            </div>

            <div class="simple-card">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list"
                           role="tab" aria-controls="list" aria-selected="true">List</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="" href="{{ route('admin.invoice.add') }}"
                           aria-controls="add" aria-selected="false">Add New Invoice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#payinvoice" role="tab"
                            aria-controls="payinvoice" aria-selected="false">Update an Invoice</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="home-tab-simple">
                        <div class="card">
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tenant</th>
                                        <th scope="col">Paid Amount</th>
                                        <th scope="col">Balance Amount</th>
                                        <th scope="col">Rent Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($invoiceupdates as $invoiceupdate)
                                        <tr>
                                            <td scope="row">{{ $invoiceupdate->id }}</td>
                                            <td scope="row">{{ $invoiceupdate->tenant->fname.' '.$invoiceupdate->tenant->lname }}</td>
                                            <td scope="row" class="text-success">{{ $invoiceupdate->amount }}</td>
                                            <td scope="row" class="text-danger">{{ $invoiceupdate->balance }}</td>
                                            <td scope="row">{{ $invoiceupdate->invoice->amount}}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <form class="d-inline" action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="payinvoice" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.invoice.pay') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Invoice No.</label>
                                            <select name="invoice_id" id="invoice_id" class="form-select">
                                                <option value="">Select an Invoice</option>
                                                @foreach($invoices as $invoice)
                                                    <option value="{{ $invoice->id }}">{{ $invoice->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Total Amount</label>
                                            <input id="invoiced" class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Paid</label>
                                            <input id="paid" class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Balance</label>
                                            <input id="balance" class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Tenant</label>
                                            <input id="tenant" class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="col-form-label">Landlord</label>
                                            <input id="landlord" class="form-control" disabled>
                                        </div>


                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Pay Invoice</label>
                                                <input name="amount" type="number" class="form-control" placeholder="Enter Amount to pay"
                                                       onkeyup="word3.innerHTML=toWord(this.value)" autocomplete required>
                                                <div class="border-bottom bg-light p-2">In Word: <span class="text-danger" id="word3"></span></div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Tenant</label>
                                                <select name="user_id" class="form-select">
                                                    <option value="">Select Tenant</option>
                                                    @foreach($tenants as $tenant)
                                                        <option value="{{ $tenant->id }}">{{ $tenant->fname.' '.$tenant->lname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="col-form-label">Landlord</label>
                                                <select name="entry_id" class="form-select">
                                                    <option value="">Landlord</option>
                                                    @foreach($landlords as $landlord)
                                                        <option value="{{ $landlord->id }}">{{ $landlord->fname.' '.$landlord->lname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Description</label>
                                            <textarea name="description" class="form-control" placeholder="Enter Description" cols="15" rows="5"></textarea>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="col-form-label">Entry Date</label>
                                            <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group text-right mt-4">
                                        <button type="submit" class="btn btn-primary">Update Invoice</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Get and show Loan information
        $('#invoice_id').on('change', function() {
            var id = $('#invoice_id').val();
            var url = '{{ url('api/invoice-info') }}?invoice=' + id;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data,status) {
                    $('#invoiced').val(data.invoiced);
                    $('#paid').val(data.paid);
                    $('#balance').val(data.balance);
                    $('#tenant').val(data.tenant);
                    $('#landlord').val(data.landlord);
                },
                error: function () {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'Oooops... No Invoice data found',
                        timer: 2500
                    });
                    $('#invoiced').val('0');
                    $('#paid').val('0');
                    $('#balance').val('0');
                    $('#tenant').val('null');
                    $('#landlord').val('null');
                }
            });
        });
    </script>
@endsection
