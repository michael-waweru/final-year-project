@extends('layouts.admin2')

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
                                    <form class="d-inline" action="#" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if ($allocation->increment_at)
                                            <p class="btn badge badge-danger">Expired</p>
                                        @else
                                            @if ($allocation->status)
                                                <input type="hidden" name="status" value="0">
                                                <button type="submit" class="btn badge badge-success">Actived</button>
                                            @elseif($allocation->status)
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit"  class="btn badge badge-secondary">Inactived</button>
                                            @else
                                                {{ $allocation->status ? 'Active':'Inactive'}}
                                            @endif
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>: {{ $allocation->name }}</td>
                            </tr>

                            <tr>
                                <td>Period</td>
                                <td>: {{ $allocation->period }} Months</td>
                            </tr>
                            <tr>
                                <td>Tenant Name</td>
                                {{--  <td>:
                                    <a class="badge badge-light" href="{{ route('admin.tenant.show', $allocation->tenant->id ) }}" target="_blank">
                                        {{ $allocation->tenant->fname." ".$allocation->tenant->lname }}
                                    </a>
                                </td>  --}}
                            </tr>
                            <tr>
                                <td>Property</td>
                                <td>: {{ $allocation->property->name }}</td>
                            </tr>
                            <tr>
                                <td>Property Type</td>
                                <td>: {{ $allocation->property->type->name }}</td>
                            </tr>
                            <tr>
                                <td>Security Money</td>
                                <td>: {{ $allocation->deposit }}</td>
                            </tr>
                            <tr>
                                <td>Increment %</td>
                                <td>: {{ $allocation->increment }}</td>
                            </tr>
                            <tr>
                                <td>Attachement</td>
                                <td>: <a class="badge badge-secondary" href="{{ url('public/storage/'.$allocation->attachment) }}" target="_blank">View</a></td>
                            </tr>
                            <tr>
                                <td>Started</td>
                                <td>: {{ $allocation->created_at->format('d-m-Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <button onclick="window.close('_self')" class="btn btn-brand float-right">Close</button>
        </div>
    </div>
@endsection
