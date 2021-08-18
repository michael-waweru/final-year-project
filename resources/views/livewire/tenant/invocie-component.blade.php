<div class="container">
    <div class="section-block">
        <h3 class="section-title">My Invoices</h3>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="home-tab-simple">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center">Tenant</th>
                            <th class="text-center">Paid</th>
                            <th class="text-center">Balance</th>
                            <th class="text-center">Total Payment</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ( $invoices as $invoice)
                            <tr>
                                <td class="text-center">{{ $invoice->tenant->fname.' '.$invoice->tenant->lname }}</td>
                                <td class="text-success text-center">{{ $invoice->amount }}</td>
                                <td class="text-danger text-center">{{ $invoice->balance }}</td>
                                <td class="text-center">{{ $invoice->invoice->payment_amount}}</td>
                                <td class="text-center">
                                    @if($invoice->amount === 0)
                                        <p class="badge badge-light-danger me-2">Unpaid</p>
                                        @elseif(($invoice->balance != 0) && ($invoice->balance < $invoice->invoice->amount))
                                        <p class="badge badge-light-warning me-2">Partially Paid</p>
                                        @elseif($invoice->balance === 0)
                                        <p class="badge badge-light-success me-2">Paid</p>
                                    @endif
                                </td>
                                <td> {{ $invoice->description}}</td>
                                <td class="text-center">
                                    <button class="btn badge badge-secondary" onclick="window.open('{{ route('tenant.invoice.show',$invoice->id)}}', '_blank')"><i class="fas fa-eye"></i> View</button>
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
