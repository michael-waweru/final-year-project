@extends('layouts.landlord2')

@section('content')
    <div>
        <div class="post d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Invoice 2 main-->
                <div class="card col-12">
                    <div class="section-block p-10">
                        <h3 class="section-title text-capitalize">Edit Memo
                            <a href="{{ route('landlord.communications') }}" class="btn btn-sm btn-success float-end">All Memos</a>
                        </h3>
                    </div>

                    <!--begin::Body-->
                    <div class="card-body p-lg-10 pt-0 col-12">
                        <!--begin::Layout-->
                        <div class=" flex-column flex-xl-row col-12">
                            <form enctype="multipart/form-data" action="{{ route('landlord.communication.update', $memo->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Name</label>
                                        <input name="name" type="text" value="{{ $memo->name }}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Memo Title</label>
                                        <input name="title" type="text" value="{{ $memo->title }}" class="form-control @error('title') is-invalid @enderror">
                                        @error('title') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Property</label>
                                        <select class="form-select form-select-solid @error('property_id') is-invalid @enderror" name="property_id" id="allocations">
                                            <option value="default">Select Property</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}" {{ $memo->property->id == $property->id ? 'selected':'' }}>{{ $property->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('property_id') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="col-form-label">Tenant</label>
                                        <select class="form-select form-select-solid @error('user_id') is-invalid @enderror" name="user_id">
                                            <option value="default">Select Tenant</option>
                                            @foreach ($tenants as $tenant)
                                                <option value="{{ $tenant->id }}" {{ $memo->tenant->id == $tenant->id ? 'selected':'' }}>{{ $tenant->fname.' '.$tenant->lname }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div id="allocation-info">
                                    <div class="row gx-10 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Property</label>
                                            <div class="mb-5">
                                                <div class="mb-5">
                                                    <input type="text" id="property" class="form-control form-control-solid" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <div class="col-lg-6">
                                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Allocated Tenant</label>
                                            <div class="mb-5">
                                                <div class="mb-5">
                                                    <input id="tenant" type="text" class="form-control form-control-solid" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label class="col-form-label">Memo Body</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" cols="15" rows="5"
                                          value="{{ $memo->description }}" name="description">
                                        </textarea>
                                        @error('description')<p class="text-danger">{{ $message }}</p> @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="col-form-label">Memo By</label>
                                        <input type="text" name="entry_id" class="form-control" value="{{ Auth::user()->fname.' '.Auth::user()->lname }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-primary">Update Memo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#allocation-info').slideUp();
        })

        // Get and show allocation information - payment
        $('#allocations').on('change', function() {
            var id = $(this).val();
            var url = '{{ url('api/allocation-info') }}?allocation=' + id;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data,status) {
                    $('#allocation-info').slideDown();
                    $('#property').val(data.property);
                    $('#tenant').val(data.tenant);
                }
            });
        });
    </script>
@endsection

