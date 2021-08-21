@extends('layouts.landlord2')

@section('content')
    <div class="row">
        <div class="card col-12">
            <div>
                <h2 class="card-header mt-8">{{ Auth::user()->fname.' '.Auth::user()->lname }}'s Revenue Report
                    <button onclick="window.print();" class="btn btn-sm btn-success float-end mr-5">Print report</button>
                </h2>
            </div>

            <div class="card-body">
                <form action="{{ route('landlord.reports') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="user">Report For</label>
                            <select name="user_id" id="" class="form-select">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ request()->user_id == $user->id ?'selected':'' }}>
                                        {{ $user->fname.' '.$user->lname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Date from</label>
                            <input name="from" type="date" class="form-control" value="{{ request()->from }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Date to</label>
                            <input name="to" type="date" class="form-control" value="{{ request()->to }}">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="submit" class="btn btn-primary mt-8" value="Go">
                            <a href="{{ route('landlord.reports') }}" class="btn btn-dark mt-8">Reset</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" name="expense" id="expense" {{ request()->expense ? 'checked':'' }}>
                                <label class="custom-control-label" for="expense">Expenses</label>
                            </div>
                        </div>
{{--                        <div class="form-group col-md">--}}
{{--                            <div class="custom-control custom-checkbox my-1 mr-sm-2">--}}
{{--                                <input type="checkbox" class="custom-control-input" name="invoice" id="invoice" {{ request()->invoice ? 'checked':'' }}>--}}
{{--                                <label class="custom-control-label" for="invoice">Invoices</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-md">--}}
{{--                            <div class="custom-control custom-checkbox my-1 mr-sm-2">--}}
{{--                                <input type="checkbox" class="custom-control-input" name="invoicePay" id="invoicePay" {{ request()->invoicePay ? 'checked':'' }}>--}}
{{--                                <label class="custom-control-label" for="invoicePay">Invoice Update</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group col-md">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" name="payment" id="payment" {{ request()->payment ? 'checked':'' }}>
                                <label class="custom-control-label" for="payment">Payments</label>
                            </div>
                        </div>
                        <div class="form-group col-md">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" name="refund" id="refund" {{ request()->refund ? 'checked':'' }}>
                                <label class="custom-control-label" for="refund">Payment Refunds</label>
                            </div>
                        </div>
                    </div>
                </form>
                @if ($reports)
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type</th>
                            <th class="text-center">Description</th>
                            <th scope="col">Amount In</th>
                            <th scope="col">Amount Out</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                            $add = 0;
                        @endphp
                        @foreach ($reports as $report)
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td scope="row">{{ $report->created_at->format('d-m-Y') }}</td>
                                <td scope="row">{{ $report->type }}</td>
                                <td scope="row">{{  $report->description }}</td>
                                <td scope="row" class="text-success">{{ $report->state == 'add' ? $report->amount:'0' }}
                                    @php
                                        $add += $report->amount;
                                    @endphp
                                </td>
                                <td scope="row" class="text-danger">{{ $report->state != 'add' ? $report->amount:'0' }}</td>
                                <td scope="row">{{ $add }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><b>Total</b></td>
                            <td><b>{{ $reports->where('state','add')->sum('amount') }}</b></td>
                            <td><b>{{ $reports->where('state','!=','add')->sum('amount') }}</b></td>
                            <td><b></b></td>
                        </tr>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
