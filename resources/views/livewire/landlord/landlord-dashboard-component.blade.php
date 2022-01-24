
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Rent Payment</h4>
                <h3 class="mt-2">
                    {{ $rent }} | Total <span
                        class="float-right text-success">Ksh. {{ $rentPayment }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('landlord.payments') }}">View</a></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Rent Refund</h4>
                <h3 class="mb-1 ">
                    {{ $refund}} | Total <span
                        class="float-right text-danger">Ksh. {{ $rentRefund }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('landlord.payments') }}">View</a></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">My Properties</h4>
                <h3 class="mb-1 ">
                   {{ App\Models\Property::where('landlord', '=', auth()->user()->id)->count() }} | Total
                </h3>
                <div class="text-right"><a href="{{ route('landlord.myproperties') }}">View</a></div>

            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">My Tenants</h4>
                <h3 class="mb-1 ">
                    {{ App\Models\Allocation::where('entry_id', '=', auth()->user()->id)->count() }} | Total
                    <span class="float-right text-danger"></span>
                </h3>
                <div class="text-right"><a href="{{ route('landlord.tenants') }}">View</a></div>

            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">My Expenses</h4>
                <h3 class="mb-1 ">
                    {{ $expense }} - Total
                    <span class="float-right text-danger">Ksh. {{ $expenseSum }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('landlord.expenses') }}">View</a></div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Cash on hand</h4>
                <h2 class="mb-1 ">Total
                    <span class="float-right text-primary">
                        Ksh {{ ($rentPayment) - ($rentRefund + $expenseSum) }}
                    </span>
                </h2>
            </div>
        </div>
    </div>
</div>

