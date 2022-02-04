@extends('layouts.admin2')

@section('content')
    <div>
        <div class="col-12">
            <div class="section-block">
                <h3 class="section-title">All Invoices</h3>
            </div>

            <div class="simple-card">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list"
                           role="tab" aria-controls="list" aria-selected="true">List</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.invoice.add') }}"
                            aria-controls="add" aria-selected="false">Add an Invoice</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="home-tab-simple">
                        <div class="card">
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="ml-2">#</th>
                                        <th scope="col">Tenant</th>
                                        <th scope="col">Rent Amount</th>
                                        <th scope="col">Amount to Pay</th>
                                        <th scope="col">Invoice Description</th>
                                        <th scope="col">Entry By</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($invoices as $key => $invoice)
                                        <tr>
                                            <td class="ml-2">{{ $key + 1 }}</td>
                                            <td>{{ $invoice->tenant->fname.' '.$invoice->tenant->lname }}</td>
                                            <td>{{ $invoice->amount }}</td>
                                            <td>{{ $invoice->payment_amount }}</td>
                                            <td>{{ $invoice->description }}</td>
                                            <td>{{ $invoice->owner->fname.' '.$invoice->owner->lname }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.invoice.edit', $invoice->id)}}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-sm btn-danger" onclick="deleteConfirmation({{ $invoice->id }})"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Delete?",
                icon: 'question',
                text: "Are you sure you want to delete Invoice?",
                type: "warning",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/invoice/delete') }}/" + id,
                        data: { _token: CSRF_TOKEN },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Success!", results.message, "success");
                                location.reload(), 3000;
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
    </script>
@endsection
