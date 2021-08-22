@extends('layouts.tenant2')

@section('content')
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">Payments</h3>
        </div>
        <div class="simple-card">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                       aria-controls="list" aria-selected="true">Payment List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#pay" role="tab" aria-controls="pay"
                       aria-selected="false">Make a Payment</a>
                </li>
            </ul>
            <div class="tab-content">
                {{-- List of payments  --}}
                <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="home-tab-simple">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Tenant</th>
                                        <th scope="col">Payment For</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Transaction No</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->created_at->format('d-m-y') }}</td>
                                            <td>{{ $payment->invoice->tenant->fname.' '.$payment->allocation->tenant->lname }} </td>
                                            <td>{{ $payment->type }}</td>
                                            <td class="text-success"><strong>{{ $payment->amount }}</strong> </td>
                                            <td>{{ $payment->payment_means }}</td>
                                            <td>{{ $payment->transaction_id }}</td>
                                            <td>
                                                <button class="btn badge badge-secondary" onclick="window.open('{{ route('landlord.payment.show',$payment->id)}}', '_blank')"><i class="fas fa-eye"></i> View</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Payment --}}
                <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="pay">
                    <div class="card-body">
                        <form action="{{ route('tenant.payment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- serial no--}}
                                <div class="form-group col-md">
                                    <label class="col-form-label">Serial No.
                                        <input type="number" name="serial" value="{{ $id = App\Models\TenantPayment::nextId() }}" class="form-control" {{ $id ? 'disabled':'' }}>
                                    </label>
                                </div>
                                {{-- Invoice--}}
                                <div class="col-md form-group">
                                    <label class="col-form-label">My Invoices</label>
                                    <select class="form-select" name="invoice_id" id="invoices" required>
                                        <option value="">Select</option>
                                        @foreach ($invoices as $key => $invoice)
                                            <option value="{{ $invoice->id }}">
                                               ({{ $key + 1 }}) {{ $invoice->tenant->fname.' '.$invoice->tenant->lname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Get invoice information from the DB--}}
                            <div class="row" id="invoice-info">
                                <div class="form-group col-3">
                                    <label class="col-form-label">Invoice No.
                                        <input id="invoice-no" type="text" class="form-control" disabled>
                                    </label>
                                </div>

                                <div class="form-group col-3">
                                    <label class="col-form-label">Tenant
                                        <input id="tenant" type="text" class="form-control" disabled>
                                    </label>
                                </div>
                                <div class="form-group col-3">
                                    <label class="col-form-label"> Amount to Pay
                                        <input id="payment_amount" type="number" class="form-control" disabled>
                                    </label>
                                </div>
                                <div class="form-group col-3">
                                    <label class="col-form-label"> Due Date
                                        <input id="due" type="text" class="form-control" disabled>
                                    </label>
                                </div>
                            </div>

                            <div class="alert alert-danger text-danger" id="due-alert">
                                This due date is almost over, You have <span id="left"></span>days before a penalty is imposed.
                            </div>

                            <div class="row">
                                {{-- Pay for--}}
                                <div class="col-md form-group" id="pay-for">
                                    <label class="col-form-label">Payment For
                                        <select class="form-select" name="type" id="pay-type" required>
                                            <option value="">Select</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Modification">Room Modification, damages or paint</option>
                                            <option value="Water">Water Bill</option>
                                            <option value="Deposit">Security Deposit</option>
                                        </select>
                                    </label>
                                </div>
                            </div>

                            {{-- montly payment--}}
                            <div class="row" id="rent-row">
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Year
                                        <select name="year" class="form-select">
                                            @foreach (range(2019, strftime("%Y", time())+5) as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>

                                {{-- month list--}}
                                <div class="form-group col-md">
                                    <label class="col-form-label">Month</label>
                                    <ul class="ks-cboxtags">
                                        <li>
                                            <input name="month[]" type="checkbox" id="jan" value="1">
                                            <label for="jan">January</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="feb" value="2">
                                            <label for="feb">February</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="mar" value="3">
                                            <label for="mar">March</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="apr" value="4">
                                            <label for="apr">April</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="may" value="5">
                                            <label for="may">May</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="jun" value="6">
                                            <label for="jun">June</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="jul" value="7">
                                            <label for="jul">July</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="aug" value="8">
                                            <label for="aug">Aug</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="sep" value="9">
                                            <label for="sep">September</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="oct" value="10">
                                            <label for="oct">October</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="nov" value="11">
                                            <label for="nov">November</label>
                                        </li>
                                        <li>
                                            <input name="month[]" type="checkbox" id="dec" value="12">
                                            <label for="dec">December</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            {{-- Amount row --}}
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Amount</label>
                                    <input name="amount" type="number" class="form-control" onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom bg-light p-2">In Word: <span class="text-danger" id="word"></span></div>
                                </div>

                                <div class="col-md-4 form-group" id="payment-info">
                                    <label class="col-form-label">Payment Method</label>
                                    <select class="form-select" name="payment_means" id="payment_means" required>
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank</option>
                                        <option value="m-pesa">M-Pesa</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4" id="m-pesa">
                                    <label class="col-form-label">M-PESA Transaction Code</label>
                                    <input id="m-pesa" name="transaction_code" type="text" class="form-control">
                                </div>
                            </div>

                            {{-- Bank Row--}}
                            <div id="bank-row">
                                <div class="row">
                                    <div class="form-group col-md">
                                        <label class="col-form-label">Bank Name</label>
                                        <input name="bank" type="text" class="form-control">
                                    </div>

                                    <div class="form-group col-md">
                                        <label class="col-form-label">Bank A/C</label>
                                        <input name="account" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md">
                                        <label class="col-form-label">Branch</label>
                                        <input name="branch" type="text" class="form-control">
                                    </div>

                                    <div class="form-group col-md">
                                        <label class="col-form-label">Cheque No</label>
                                        <input name="cheque" type="text" class="form-control">
                                    </div>

                                    <div class="form-group col-md">
                                        <label class="col-form-label">Cheque scan copy</label>
                                        <input name="attachment" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md form-group col-md-6">
                                    <label for="created_at" class="col-form-label">Payment Date</label>
                                    <input name="created_at" type="date" value="{{ date('Y-m-d') }}" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Entry by</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->fname.' '.Auth::user()->lname }}" disabled>
                                </div>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Make Payment Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#invoice-info').slideUp();
            $('#pay-for').slideUp();
            $('#rent-row').slideUp();
            $('#bank-row').fadeOut();
            $('#m-pesa').fadeOut();

            $('#due-alert').fadeOut();
        })

        // Get and show invoice information - payment
        $('#invoices').on('change', function() {
            var id = $(this).val();
            var url = '{{ url('api/tenant-info') }}?invoice=' + id;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data,status) {
                    $('#pay-for').slideDown();
                    $('#invoice-info').slideDown();

                    $('#invoice-no').val(data.number);
                    $('#tenant').val(data.tenant);
                    $('#payment_amount').val(data.payment_amount);
                    $('#due').val(data.due);
                    $('#left').val(data.left === 0 ? 'Some days':data.left  +' days');

                    if (data.due < 5) {
                        $('#due-alert').fadeIn();
                    }
                }
            });
        });

        // type for rent show month list
        $('#pay-type').on('change', function() {
            var type = $(this).val();
            if ( type === 'Rent') {
                $('#rent-row').slideDown();
            }else{
                $('#rent-row').slideUp();
            }
        });

        // show related field by payment means
        $('#payment_means').on('change', function() {
            var payment_means = $(this).val();

            if (payment_means == 'bank') {
                $('#bank-row').fadeIn();
            }else{
                $('#bank-row').fadeOut();
            }

            if (payment_means == 'm-pesa') {
                $('#m-pesa').fadeIn();
            }
            else {
                $('#m-pesa').fadeOut();
            }
        });
    </script>
@endsection
