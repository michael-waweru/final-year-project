@extends('layouts.tenant2')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Allocation Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td>Status</td>
                                <td>:
                                    @if ($allocation->increment_at)
                                        <p class="btn badge badge-danger">Expired</p>
                                    @else
                                        @if ($allocation->status)
                                            <input type="hidden" name="status" value="0">
                                            <p class="badge badge-success">Active</p>
                                        @elseif($allocation->status)
                                            <input type="hidden" name="status" value="1">
                                            <p  class="badge badge-secondary">Inactive</p>
                                        @else
                                            {{ $allocation->status ? 'Active':'Inactive'}}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tenant's Name</td>
                                <td>: {{ $allocation->tenant->fname.' '.$allocation->tenant->lname }}</td>
                            </tr>

                            <tr>
                                <td>Allocation Period</td>
                                <td>: {{ $allocation->period }} Months</td>
                            </tr>
                            <tr>
                                <td>Allocated Property</td>
                                <td>: {{ $allocation->name }}</td>
                            </tr>
                            <tr>
                                <td>Property Type</td>
                                <td>: {{ $allocation->property->property_type->name }}</td>
                            </tr>
                            <tr>
                                <td>Deposit Paid</td>
                                <td>: {{ $allocation->deposit }}</td>
                            </tr>
                            <tr>
                                <td>Increment</td>
                                <td>: {{ $allocation->increment }}% after {{ $allocation->period }} months</td>
                            </tr>
                            <tr>
                                <td>Agreement</td>
                                <td>: <a class="badge badge-secondary" href="{{ asset('files/assets/allocation/'.$allocation->attachment) }}" target="_blank">View</a></td>
                            </tr>
                            <tr>
                                <td>Started</td>
                                <td>: {{ $allocation->created_at->format('d-m-Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <button onclick="window.close('_self')" class="btn btn-success float-right">Close</button>
        </div>
    </div>
@endsection
