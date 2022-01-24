<div class="post d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Invoice 2 main-->
        <div class="card col-12">
            <div class="section-block p-10">
                <h3 class="section-title text-capitalize">Edit Property Type
                    <a href="{{ route('admin.property.type')}}" class="btn btn-sm btn-success float-end">All Types</a>
                </h3>
            </div>
            {{-- <span class="p-10">
                <a href="{{ route('admin.property.type')}}" class="btn btn-sm btn-success float-end">All Types</a>
            </span> --}}
            <!--begin::Body-->
            <div class="card-body p-lg-10 pt-0 col-12">
                <!--begin::Layout-->
                <div class=" flex-column flex-xl-row col-12">
                    <form wire:submit.prevent="updateType">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label">Type Name</label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" wire:keyup="generateSlug">
                                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label">Type Slug</label>
                                <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" wire:model="slug">
                                @error('slug') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
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
