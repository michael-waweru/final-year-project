<div>
    <div class="post d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Invoice 2 main-->
            <div class="card col-12">
                <div class="section-block p-10">
                    <h3 class="section-title text-capitalize">Add New Tenant
                        <a href="{{ route('admin.tenants') }}" class="btn btn-sm btn-success float-end">All Tenants</a>
                    </h3>
                </div>

                <!--begin::Body-->
                <div class="card-body p-lg-10 pt-0 col-12">
                    <!--begin::Layout-->
                    <div class=" flex-column flex-xl-row col-12">
                        <form enctype="multipart/form-data" wire:submit.prevent="storeTenant">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">First Name</label>
                                    <input name="fname" type="text" placeholder="e.g Michael" class="form-control @error('fname') is-invalid @enderror" wire:model="fname">
                                    @error('fname') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="form-group col-6">
                                    <label class="col-form-label">Last Name</label>
                                    <input name="lname" type="text" placeholder="e.g Waweru" class="form-control @error('lname') is-invalid @enderror" wire:model="lname">
                                    @error('lname') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">Email Address</label>
                                    <input name="email" type="email" placeholder="e.g example@mail.com" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                                    @error('email') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="form-group col-6">
                                    <label class="col-form-label">Password</label>
                                    <input name="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password" autocomplete="new-password">
                                    @error('password') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">Password Confirmation</label>
                                    <input name="password_confirmation" placeholder="password Confirm" type="password" class="form-control" wire:model="password_confirmation" autocomplete="new-password">
                                </div>

                                <div class="form-label col-6">
                                    <label class="form-label required fs-5 fw-bold mb-2">Role</label>
                                    <select class="form-select form-select-solid @error('role') is-invalid @enderror" wire:model="role" >
                                        <option value="default">Select Role</option>
                                        <option value="2">Landlord</option>
                                        <option value="3">Tenant</option>
                                    </select>
                                    @error('role') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">ID No.</label>
                                    <input name="identification_number" type="number" placeholder="e.g 12345678" class="form-control @error('identification_number') is-invalid @enderror"
                                    maxlength="8" wire:model="identification_number">
                                    @error('identification_number') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">ID Attachment</label>
                                    <input name="tenant[identification_doc]" type="file" class="form-control @error('identification_doc') is-invalid @enderror" wire:model="identification_doc">
                                    @error('identification_doc') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">Address</label>
                                    <input name="address" type="text" placeholder="e.g Nakuru" class="form-control @error('address') is-invalid @enderror" wire:model="address">
                                    @error('address') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Contact</label>
                                    <input name="contact" type="number" placeholder="e.g. 0712345678" class="form-control @error('address') is-invalid @enderror" wire:model="contact" maxlength="8">
                                    @error('contact') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <h2 class="mt-5 mb-0">Guarantor information</h2>

                            <div class="row mt-4">
                                <div class="form-group col-6">
                                    <label class="col-form-label">First Name</label>
                                    <input name="guarantor_fname" placeholder="e.g William" type="text" class="form-control @error('guarantor_fname') is-invalid @enderror"
                                    wire:model="guarantor_fname">
                                    @error('guarantor_fname')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="form-group col-6">
                                    <label class="col-form-label">Last Name</label>
                                    <input name="guarantor_lname" type="text" placeholder="e.g. Lawson" class="form-control @error('guarantor_lname') is-invalid @enderror" wire:model="guarantor_lname">
                                    @error('guarantor_lname')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">ID No.</label>
                                    <input name="guarantor_id_no" placeholder="e.g 12345678" type="number" class="form-control @error('guarantor_id_no') is-invalid @enderror"
                                        wire:model="guarantor_id_no" maxlength="8">
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Address</label>
                                    <input name="guarantor_address" type="text" placeholder="e.g. Kitale" class="form-control" wire:model="guarantor_address">
                                </div>
                            </div>
                            <div class="field_wrapper">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Contact</label>
                                        <input name="guarantor_contact" placeholder="e.g 0712345678" type="number" class="form-control @error('guarantor_contact') is-invalid @enderror"
                                        wire:model="guarantor_contact">
                                        @error('guarantor_contact') <p class="text-danger">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="col-form-label">Entry By</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->fname.' '.Auth::user()->lname }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Save Tentant</button>
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

