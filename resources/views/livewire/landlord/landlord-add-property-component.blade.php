<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body p-0">
                    <form class="form" id="kt_modal_add_customer_form" wire:submit.prevent="addProperty">
                        <div class="modal-header" id="kt_modal_add_customer_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bolder">Add a New Property</h2>
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <a class="text-white" href="{{ route('landlord.myproperties') }}">
                                        <button type="button" class="btn btn-primary">All My Properties</button>
                                    </a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                        </div>

                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7">

                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Property name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" wire:model="name" wire:keyup="generateSlug"
                                        placeholder="e.g Wa-wahu Plaza" name="name" />
                                        @error('name')<p class="text-danger">{{ $message }} </p>@enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Property slug</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="text" class="form-control form-control-solid  @error('slug') is-invalid @enderror"
                                        name="slug" wire:model="slug"/>
                                        @error('slug')<p class="text-danger">{{ $message }} </p>@enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Property Rent</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-solid @error('price') is-invalid @enderror" wire:model="price"
                                        placeholder="Property Rent" name="price" onkeyup="word2.innerHTML=toWord(this.value)"/>
                                        @error('price')<p class="text-danger">{{ $message }} </p>@enderror
                                        <!--end::Input-->
                                        <div class="border-bottom p-2">In Word: <span class="text-danger" id="word2"></span></div>
                                    </div>

                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Year Built</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control form-control-solid  @error('year_built') is-invalid @enderror"
                                        name="year_built" wire:model="year_built"/>
                                        @error('year_built')<p class="text-danger">{{ $message }} </p>@enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <div class="form-group">
                                            <label for="Property Description" class="form-label required fs-5 fw-bold mb-2">Property Description</label>
                                            <div class="col-md-12 pl-0">
                                                <textarea class="form-control @error('description') is-invalid @enderror" cols="15" rows="5" placeholder="Property Description" wire:model="description"></textarea>
                                            </div>
                                            @error('description')<p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-6 fv-row">
                                        <div class="col-md form-group">
                                            <label class="col-form-label">Property Landlord</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->fname.' '.Auth::user()->lname }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <div class="form-label">
                                            <label class="form-label required fs-5 fw-bold mb-2">Property Type</label>
                                                <select class="form-select form-select-solid @error('property_type_id') is-invalid @enderror" wire:model="property_type_id" >Property Type
                                                    <option value="default">Select Property Type</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            @error('property_type_id')<p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <div class="form-label">
                                            <label class="form-label required fs-5 fw-bold mb-2">Bedrooms</label>
                                                <select class="form-select form-select-solid @error('bedrooms') is-invalid @enderror" wire:model="bedrooms" >Bedrooms
                                                    <option class="form-label" value="default">Select Number of Bedrooms</option>
                                                    <option value="Bedsitter">Bedsitter</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            @error('bedrooms') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <div class="form-label">
                                            <label class="form-label required fs-5 fw-bold mb-2">Property Status</label>
                                            <select class="form-select form-select-solid @error('status') is-invalid @enderror" wire:model="status" >Select Property Status
                                                <option value="default">Select Status</option>
                                                <option value="Rent">For Rent</option>
                                                <option value="Sale">For Sale</option>
                                            </select>
                                            @error('status') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <div class="form-label">
                                            <label class="form-label required fs-5 fw-bold mb-2">Garage Availability</label>
                                                <select class="form-select form-select-solid @error('garage') is-invalid @enderror" wire:model="garage" >Select Availability
                                                    <option value="default">Select Garage Availability</option>
                                                    <option value="available">Available</option>
                                                    <option value="unavailable">Not Available</option>
                                                </select>
                                            @error('garage')<p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <div class="form-label">
                                            <label class="form-label required fs-5 fw-bold mb-2">Property Location</label>
                                            <select class="form-select form-select-solid @error('location_id') is-invalid @enderror" wire:model="location_id">
                                                <option value="">Select Location</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @endforeach
                                            </select>
                                            @error('location_id') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <div class="form-group">
                                            <label class="form-label required fs-5 fw-bold mb-2">Property Image</label><br>
                                            <input type="file" class="input-file" wire:model="image"/>
                                                @if ($image)
                                                    <img src="{{ $image->temporaryUrl() }}" width="120">
                                                @endif
                                            @error('image')<p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-header col-md-12">
                                    <h2 class="fw-bolder">Location Details</h2>
                                </div>

                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Known Neighborhood</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid @error('precise_location') is-invalid @enderror" wire:model="precise_location"
                                        placeholder="e.g Nakuru City, Kericho Town" name="precise_location" />
                                        @error('precise_location')<p class="text-danger">{{ $message }} </p>@enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Nearby School</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="text" class="form-control form-control-solid  @error('school') is-invalid @enderror"
                                        name="school" placeholder="e.g Kiungururia University" wire:model="school"/>
                                        @error('school')<p class="text-danger">{{ $message }} </p>@enderror
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Nearby Hospital</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid @error('medical') is-invalid @enderror" wire:model="medical"
                                        placeholder="e.g Mercy Mission Hospital" name="medical" />
                                        @error('medical')<p class="text-danger">{{ $message }} </p>@enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Nearby Religious Institution</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="text" class="form-control form-control-solid  @error('church') is-invalid @enderror"
                                        name="church" placeholder="e.g AlHudha Mosque, Seventh-Day Adventist, Catholic Church" wire:model="church"/>
                                        @error('church')<p class="text-danger">{{ $message }} </p>@enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                            <!--end::Scroll-->
                        </div>

                        <div class="row">
                            <div class="col-md form-group">
                                <label class="col-form-label">Entry By</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->fname.' '.Auth::user()->lname }}" disabled>
                            </div>
                        </div>

                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-white me-3">Discard</button>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Add Property</span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
