@extends('layouts.admin2')

@section('content')

    <div class="col-12">
        <div class="card">

            <div class="card-header mt-10">
                <h3>Detailed Payment Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td>Serial No.</td>
                                <td>: #{{ $payment->id }}</td>
                            </tr>
                            <tr>
                                <td>Allocation</td>
                                <td>: {{ $payment->allocation->name }}</td>
                            </tr>
                            <tr>
                                <td>Tentant Name</td>
                                <td>: <a class="badge badge-light" href="{{ route('admin.tenant.show', $payment->allocation->tenant->id ) }}" target="_blank">{{ $payment->allocation->tenant->fname." ".$payment->allocation->tenant->lname }}</a></td>
                            </tr>
                            <tr>
                                <td>Payment For</td>
                                <td>: {{ $payment->type }}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>: {{ $payment->year }}</td>
                            </tr>
                            <tr>
                                <td>Payment Method</td>
                                <td>: {{ $payment->payment_means }}</td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td>:Ksh. {{ $payment->amount }}</td>
                            </tr>
                            <tr>
                                <td>Transaction ID</td>
                                <td>: {{ $payment->transaction_id }}</td>
                            </tr>

                            <tr>
                                <td>Created at</td>
                                <td>: {{ $payment->created_at->format('d-m-y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <button onclick="window.close('_self')" class="btn btn-success float-right">Close</button>
        </div>
    </div>
@endsection
