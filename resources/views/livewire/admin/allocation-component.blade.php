<div>
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">All Allocations</h3>
        </div>
        <div class="simple-card">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                        aria-controls="list" aria-selected="true">List</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#add" role="tab"
                        aria-controls="profile" aria-selected="false">Add</a>
                </li> --}}
                <a href="{{ route('admin.allocation.add') }}">
                    <button type="button" class="btn btn-primary">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                            </svg>
                        </span>
                        Add an Allocation
                    </button>
                </a>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="list">
                    <div class="card">

                        <div class="card-body">

                            @foreach (App\Models\Allocation::getExpired() as $allocation)
                                <div class="alert alert-danger">
                                    <span class="text-danger"> Action Required! </span>Allocation
                                    <a href="#" target="_blank"> #{{ $allocation->id }}'s</a>
                                      period has expired and rent incremented by <span class="text-danger">{{ $allocation->penalty }}%</span> .
                                    <a href="#" onclick="form{{ $allocation->id }}.submit()" class="text-success">Renew Now!</a>

                                    <form id="form #" method="POST">
                                        @csrf
                                        @method('PUT')
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
                                            <th scope="col">Details</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allocations as $index => $allocation)
                                            <tr>
                                                <td>{{ $index + 1}}</td>
                                                <td>{{ $allocation->name }}</td>
                                                {{-- <td>{{ $allocation->property->type->name ?? 'Deleted' }}</td> --}}
                                                <td>{{ $allocation->property->name ?? 'Deleted'}}</td>
                                                <td>{{ $allocation->rent ?? 'Deleted' }}</td>
                                                <td>
                                                    <a class="badge badge-light" href="{{ route('admin.tenant.show', ['tenant'=> $allocation->user->id]) }}" target="_blank">{{ $allocation->user->fname." ".$allocation->user->lname }}<i class="fas fa-eye"></i></a>
                                                </td>
                                                <td>
                                                    <form class="d-inline" action="#" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        @if ($allocation->created)
                                                                <p class="btn badge badge-danger">Expired</p>
                                                            @elseif($allocation->status)
                                                                <input type="hidden" name="status" value="0">
                                                                <button type="submit" class="btn badge badge-success">Active</button>
                                                            @elseif($allocation->status)
                                                                <input type="hidden" name="status" value="1">
                                                                <button type="submit"class="btn badge badge-warning">Inactive</button>

                                                            @else
                                                            {{ $allocation->status ? 'Active':'Inactive'}}
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <button class="btn badge badge-secondary" onclick="window.open('{{ route('admin.allocation.show',$allocation->id)}}', '_blank')">
                                                        <i class="fas fa-eye"></i> View
                                                    </button>

                                                </td>
                                                <td class="text-right">
                                                    @if (!$allocation->penalty)
                                                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    @endif
                                                    {{-- <button class="btn btn-sm btn-danger" onclick="deleteConfirmation({{$allocation->id}})"><i class="fas fa-trash-alt"></i> --}}
                                                        <button class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete this allocation? This action cannot be undone') || event.stopImmediatePropagation()"wire:click.prevent="deleteAllocation({{ $allocation->id }})"><i class="fas fa-trash-alt"></i>

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
</div>

@section('scripts')
    <script>
        // Get properties by type
        $('#types').on('change', function() {
            var type = $('#types').val();
            var url = '{{ url('api/properties') }}?type=' + type;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data,status) {
                    if (!data.length) {
                        toastr.info('No property found');
                    }

                    $('#properties').html('');

                    data.forEach(element => {
                            $('#properties').append('<option value="'+element.id+'">'+element.name+'</option>')
                    });
                }
            });
        });

    </script>

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
