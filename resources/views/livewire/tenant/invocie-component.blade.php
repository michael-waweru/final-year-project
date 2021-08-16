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
                            <th class="text-center">#</th>
                            <th class="text-center">Tenant</th>
                            <th class="text-center">Paid</th>
                            <th class="text-center">Balance</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Rent Amount</th>
                            <th class="text-center">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ( $invoices as $invoice)
                            <tr>
                                <td class="text-center">{{ $invoice->invoicecounter }}</td>
                                <td class="text-center">{{ $invoice->tenant->fname.' '.$invoice->tenant->lname }}</td>
                                <td class="text-success text-center">{{ $invoice->amount }}</td>
                                <td class="text-danger text-center">{{ $invoice->balance }}</td>
                                <td class="text-center">{{ $invoice->landlord->fname.' '.$invoice->landlord->lname }} </td>
                                <td class="text-center">{{ $invoice->invoice->amount}}</td>
                                <td> {{ $invoice->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
