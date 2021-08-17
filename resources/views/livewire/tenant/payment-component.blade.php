@extends('layouts.landlord2')

@section('content')
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">My Payments</h3>
        </div>
        <div class="simple-card">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                       aria-controls="list" aria-selected="true">Payment List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#refund_list" role="tab" aria-controls="pay"
                       aria-selected="false">Refund List</a>
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
                                        <th scope="col">Date</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Allocated Property</th>
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
                                            <td>{{ $payment->allocation->tenant->fname.' '.$payment->allocation->tenant->lname }} </td>
                                            <td>{{ $payment->allocation->property->name }}</td>
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

                {{-- List of Refunds  --}}
                <div class="tab-pane fade" id="refund_list" role="tabpanel" aria-labelledby="home-tab-simple">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Refund No.</th>
                                        <th scope="col">Tenant</th>
                                        <th scope="col">Refund For</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Reason</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($refunds as $refund)
                                        <tr>
                                            <td>{{ $refund->created_at->format('d-m-y') }}</td>
                                            <td>{{ $refund->payment_id }}</td>
                                            <td>{{ $refund->payment->allocation->tenant->fname ?? 'deleted' }}
                                                {{ $refund->payment->allocation->tenant->lname ?? ''}}
                                            </td>
                                            <td>{{ $refund->payment->type }}</td>
                                            <td class="text-danger"><strong> {{ $refund->amount }} </strong> </td>
                                            <td>{{ $refund->description }}</td>
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
