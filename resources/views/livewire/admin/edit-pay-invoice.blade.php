@extends('layouts.admin2')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.pay.update',$invoice->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Invoice Number</label>
                            <input type="text" name="invoice_id" class="form-control" value="{{ $invoice->id }}" disabled>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="col-form-label">Amount</label>
                            <input name="amount" value="{{ $invoice->amount }}" type="number" class="form-control" autocomplete required>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="col-form-label">Entry Date</label>
                            <input name="created_at" type="date" class="form-control" value="{{ $invoice->created_at->format('Y-m-d') }}" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Tenant</label>
                            <select name="user_id" class="form-select">
                                <option value="">Select Tenant</option>
                                @foreach(\Illuminate\Support\Facades\DB::table('users')->where('role', '=', 3)->get() as $tenant)
                                    <option value="{{ $invoice->entry->fname.' '.$invoice->entry->lname }}" {{ $invoice->tenant->id == $tenant->id ? 'selected':'' }}>
                                        {{ $tenant->fname.' '.$tenant->lname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="col-form-label">Landlord</label>
                            <input name="entry_id" type="text" class="form-control" value="{{ $invoice->entry_id }}" hidden>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-form-label">Description</label>
                            <textarea name="description" class="form-control" id="" cols="15" rows="5">{{ $invoice->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group text-right mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
