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
                                        <th scope="col">#</th>
                                        <th scope="col">Tenant</th>
                                        <th scope="col">Rent Amount</th>
                                        <th scope="col">Amount to Pay</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($invoices as $key => $invoice)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $invoice->tenant->fname }}</td>
                                            <td>{{ $invoice->amount }}</td>
                                            <td>{{ $invoice->payment_amount }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-sm btn-danger" onclick="deleteConfirmation()"><i class="fas fa-trash-alt"></i></button>
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
