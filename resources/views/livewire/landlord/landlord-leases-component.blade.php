<div class="col-12">
        <div class="section-block">
            <h3 class="section-title">Allocations</h3>
        </div>
        <div class="simple-card">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                        aria-controls="list" aria-selected="true">List</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('landlord.lease.add') }}">
                        <button type="button" class="btn btn-primary">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                                </svg>
                            </span>
                            Add New Lease
                        </button>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="list">
                    <div class="card">
                        <div class="card-body">
                            @foreach (App\Models\Allocation::getExpired() as $lease)
                            <div class="alert alert-danger">
                                <span class="text-danger"> Action : </span>
                                <a href="{{ route('landlord.lease.show', $lease->id) }}" target="_blank">#{{ $lease->id }}</a> allocation's period has been over and rent
                                incremented to <span class="text-danger">{{ $lease->increment }}%</span> .
                                <a href="#" onclick="form{{ $lease->id }}.submit()" class="text-success">Renew Now!</a>

                                <form id="form{{ $lease->id }}" action="{{ route('landlord.lease.update', $lease->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="expired" value="true">
                                </form>

                            </div>
                            @endforeach

                            <div class="table-responsive ">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Allocation</th>
                                            <th scope="col">Property</th>
                                            <th scope="col">Rent</th>
                                            <th scope="col">Tenant</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leases as $lease)
                                        <tr>
                                            <td>{{ $lease->id }}</td>
                                            <td>{{ $lease->name }}</td>
                                            <td>{{ $lease->property->name ?? 'Deleted'}}</td>
                                            <td>{{ $lease->rent ?? 'Deleted' }}</td>
                                            <td> {{ $lease->tenant->fname." ".$lease->tenant->lname }} </td>
                                            <td>
                                                <form class="d-inline" action="{{ route('landlord.lease.update', ['lease' => $lease->id]) }}" method="POST">
                                                    @csrf
                                                    @if ($lease->increment_at)
                                                        <p class="btn badge badge-danger">Expired</p>
                                                        @else
                                                            @if ($lease->status)
                                                                <input type="hidden" name="status" value="0">
                                                                <button type="submit" class="btn badge badge-success">Active</button>
                                                            @else
                                                                <input type="hidden" name="status" value="1">
                                                                <button type="submit" class="btn badge badge-secondary">Inactive</button>
                                                            @endif
                                                    @endif
                                                </form>
                                            </td>
                                            <td class="text-right">
                                                @if (!$lease->increment_at)
                                                    <a href="{{ route('landlord.lease.edit', $lease->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                                                @endif

                                                <form class="d-inline" action="{{ route('landlord.lease.destroy', $lease->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
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
        </div>
    </div>

@section('scripts')
    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Delete?",
                icon: 'question',
                text: "Are you sure you want to delete Allocation?",
                type: "warning",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/allocation/delete')}}/" + id,
                        data: { _token: CSRF_TOKEN },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Success!", results.message, "success");
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                        e.dismiss;
                    }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
@endsection
