@extends('layouts.admin2')

@section('content')
    <div class="col-12">
        <div class="card">
            <h5 class="card-header" style="margin-top: 40px; font-size: 2em;">Edit Invoice</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.invoice.update', $invoice->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">Invoice Number</label>
                                <input name="id" value="{{ $invoice->id }}" type="text" class="form-control" disabled>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Tenant</label>
                                <select name="user_id" class="form-select" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $invoice->tenant->id == $user->id ? 'selected':'' }}>{{ $user->fname.' '.$user->lname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Rent Amount</label>
                                <input name="amount" value="{{ $invoice->amount }}" type="number" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label">Amount to Pay</label>
                                <input name="payment_amount" value="{{ $invoice->payment_amount }}" type="number" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label">Payment Date</label>
                                <input name="payment_date" value="{{ $invoice->payment_date->format('Y-m-d') }}" type="date" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label">Entry Date</label>
                                <input name="created_at" value="{{ $invoice->created_at->format('Y-m-d') }}" type="date" class="form-control" value="{{date('Y-m-d')}}" required>
                            </div>
                                <div class="form-group col-12">
                                    <label class="col-form-label">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="15" rows="5">{{ $invoice->description }}</textarea>
                                </div>
{{--                            <div class="form-group  col-6">--}}
{{--                                <label class="col-form-label">Entry by</label>--}}
{{--                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>--}}
{{--                            </div>--}}
                        </div>
                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Update Invoice</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
