<div>
    {{-- <div class="toolbar">
        <div class="container-fluid d-flex flex-stack">
            <div data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

                    <small class="text-muted fs-7 fw-bold my-1 ms-1">
                        Hello <strong>{{ Auth::user()->fname.' '.Auth::user()->lname }}</strong>. You are logged in as an Admin
                    </small>
                </h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <div class="me-4">
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">
                        {{ date('l').', '.date('d M, Y') }} | <span id="clock"></span>
                    </small>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="post d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Invoice 2 main-->
            <div class="card col-12">
                <div class="section-block p-10">
                    <h3 class="section-title text-capitalize">Add New Location
                        <a href="{{ route('admin.locations')}}" class="btn btn-sm btn-success float-end">All Locations</a>
                    </h3>
                </div>
                {{-- <span class="p-10">
                    <a href="{{ route('admin.property.type')}}" class="btn btn-sm btn-success float-end">All Types</a>
                </span> --}}
                <!--begin::Body-->
                <div class="card-body p-lg-10 pt-0 col-12">
                    <!--begin::Layout-->
                    <div class=" flex-column flex-xl-row col-12">
                        <form wire:submit.prevent="storeLocation">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Location Name</label>
                                    <input name="name" type="text" placeholder="e.g. Nakuru City, Kiambu Town" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name" wire:keyup="generateSlug">
                                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Location Slug</label>
                                    <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" wire:model="slug" >
                                    @error('slug') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">County</label>
                                    <input name="county" type="text" placeholder="e.g. 2 Uasin Gishu" class="form-control @error('county') is-invalid @enderror"
                                    wire:model="county">
                                    @error('county') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Country</label>
                                    <input name="country" type="text" placeholder="Kenya" class="form-control @error('country') is-invalid @enderror" wire:model="country" >
                                    @error('country') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Zip</label>
                                    <input name="zip" type="text" placeholder="e.g. 20100" class="form-control @error('zip') is-invalid @enderror"
                                    wire:model="zip">
                                    @error('zip') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Invoice 2 main-->
        </div>
    </div>
</div>



