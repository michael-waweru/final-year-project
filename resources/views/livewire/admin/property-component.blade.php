<div>
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">Properties</h3>
        </div>

        <div class="simple-card">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list"
                        role="tab" aria-controls="list" aria-selected="true">List</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#add" role="tab"
                        aria-controls="add" aria-selected="false">Add</a>
                </li> --}}
                <a href="{{ route('admin.property.add') }}">
                    <button type="button" class="btn btn-primary">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                            </svg>
                        </span>
                        Add New Property
                    </button>
                </a>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="home-tab-simple">
                    <div class="card">
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $key => $property)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $property->name }}</td>
                                        <td>{{ $property->property_type->name ?? 'Deleted' }}</td>
                                        <td>{{ $property->price }}</td>
                                        <td>{{ $property->location->name }}</td>
                                        <td class="{{ $property->allocations->count() ? 'text-success':'text-danger' }}" style="font-weight: bold;">{{ $property->allocations->count() ? 'Occupied':'Vacant' }}</td>
                                        <td class="text-right">
                                            {{-- <a href="#" onclick="window.open('#', '_blank')" class="btn btn-sm btn-dark"><i class="fas fa-history"></i></a> --}}
                                            <a href="{{ route('admin.property.edit',['property_slug'=>$property->slug]) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" onclick="deleteConfirmation({{$property->id}})"><i class="fas fa-trash-alt"></i>
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
                text: "Are you sure you want to delete Property?",
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
                        url: "{{ url('/property/delete')}}/" + id,
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
