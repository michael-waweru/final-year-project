<div>
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">All Landlords</h3>
        </div>
        <div class="simple-card">
            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                        aria-controls="list" aria-selected="true">List</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#add" role="tab"
                        aria-controls="profile" aria-selected="false">Add</a>
                </li> --}}
                <a href="{{ route('admin.landlord.add') }}">
                    <button type="button" class="btn btn-primary">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                            </svg>
                        </span>
                        Add New Landlord
                    </button>
                </a>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="add">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
{{--                                    <th scope="col">Landlord ID</th>--}}
                                    <th class="text-center">Full Names</th>
                                    <th class="text-center">No. of Properties</th>
                                    <th scope="col">Contact Info</th>
                                    <th class="text-center">Details</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($landlords as $index => $landlord)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
{{--                                    <td> {{ $landlord->id }} </td>--}}
                                    <td class="text-center"> {{ $landlord->fname.' '.$landlord->lname }} </td>
                                    {{-- <td> {{ $landlord->landlord }} </td> --}}
                                    <td class="text-center">{{  DB::table('properties')->where('landlord', '=', $landlord->id)->count() }}</td>
                                    <td> {{ $landlord->contact }} </td>
                                    <td class="text-center">
                                        <button class="btn badge badge-secondary" onclick="window.open('{{ route('admin.tenant.show', $landlord->id ) }}', '_blank')"><i class="fas fa-eye"></i> View</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="deleteConfirmation({{ $landlord->id }})"><i class="fas fa-trash-alt"></i></button>
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
                text: "Are you sure you want to delete Landlord?",
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
                        url: "{{ url('/landlord/delete') }}/" + id,
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

