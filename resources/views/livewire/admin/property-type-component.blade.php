
<div class="col-12">
    <div class="section-block">
        <h3 class="section-title text-capitalize">Property Types</h3>
    </div>
    <div class="simple-card">

        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" data-toggle="tab" href="{{ route('admin.property.type') }}"
                    role="tab" aria-controls="list" aria-selected="true">List</a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="{{ route('admin.type.add') }}" role="tab"
                    aria-controls="add" aria-selected="false">Add</a>
            </li> --}}
            <a href="{{ route('admin.type.add') }}">
                <button type="button" class="btn btn-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                            <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                        </svg>
                    </span>
                    Add New Property Type
                </button>
            </a>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="list">
                <div class="card">
                    <div class="card-body table-resonsive">
                        <table id="example" class="table table-striped table-bordered second">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $index => $type)
                                <tr>
                                    <th scope="row">{{$index + 1}}</th>
                                    <td>{{$type->name}}</td>
                                    <td>{{ $type->slug }}</td>
                                    <td>{{ $type->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.type.edit',['type_slug'=>$type->slug]) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>

                                        <button class="btn btn-sm btn-danger" onclick="deleteConfirmation( {{$type->id}} )"><i class="fas fa-trash-alt"></i></button>

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

@section('scripts')
    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Delete?",
                icon: 'question',
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/property/type/delete')}}/" + id,
                        data: { _token: CSRF_TOKEN },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Success!", results.message, "success");
                                location.reload(), 3000;
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
