@extends('layouts.admin2')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="margin-top: 50px;">
                <h2>Allocation Information</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td>Allocation Status</td>
                                <td>:
                                    <form class="d-inline" action="{{ route('admin.allocation.update', ['allocation' => $allocation->id]) }}" method="POST">
                                        @csrf
                                        @if ($allocation->increment_at)
                                            <p class="btn badge badge-danger">Expired</p>
                                        @else
                                            @if ($allocation->status)
                                                <input type="hidden" name="status" value="0">
                                                <button type="submit" class="btn badge badge-success">Active</button>
                                            @elseif($allocation->status)
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit"  class="btn badge badge-secondary">Inactive</button>
                                            @else
                                                {{ $allocation->status ? 'Active':'Inactive'}}
                                            @endif
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Allocation's Name</td>
                                <td>: {{ $allocation->name }}</td>
                            </tr>

                            <tr>
                                <td>Allocated Period</td>
                                <td>: {{ $allocation->period }} Months</td>
                            </tr>
                            <tr>
                                <td>Tenant's Name</td>
                                  <td>:
                                    <a class="badge badge-light" href="{{ route('admin.tenant.show', $allocation->tenant->id ) }}" target="_blank">
                                        {{ $allocation->tenant->fname." ".$allocation->tenant->lname }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Allocated Property</td>
                                <td>: {{ $allocation->property->name }}</td>
                            </tr>
                            <tr>
                                <td>Property Type</td>
                                <td>: {{ $allocation->property->property_type->name }}</td>
                            </tr>
                            <tr>
                                <td>Deposit Amount</td>
                                <td>: {{ $allocation->deposit }}</td>
                            </tr>
                            <tr>
                                <td>Increment Rate</td>
                                <td>: {{ $allocation->increment }}%</td>
                            </tr>
                            <tr>
                                <td>Agreement Attachment</td>
                                <td>: <a class="badge badge-secondary" href="{{ $allocation->attachment }}" target="_blank">View</a></td>
                            </tr>
                            <tr>
                                <td>Date Allocated</td>
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
