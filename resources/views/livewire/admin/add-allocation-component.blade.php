
<div>
    <div class="post d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card col-12">
                <div class="section-block p-10">
                    <h3 class="section-title text-capitalize">Allocate a Property
                        <a href="{{ route('admin.allocation') }}" class="btn btn-sm btn-success float-end">All Allocations</a>
                    </h3>
                </div>
                <!--begin::Body-->
                <div class="card-body p-lg-10 pt-0 col-12">
                    <!--begin::Layout-->
                    <div class=" flex-column flex-xl-row col-12">
                        <form enctype="multipart/form-data" wire:submit.prevent="storeAllocation">
                            @csrf
                            <div class="row">

                                <div class="form-group col-md">
                                    <label class="col-form-label">Agreement Name</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md form-group">
                                    <label class="col-form-label">Property Type</label>
                                    <select id="types" class="form-select">
                                        <option>Select type</option>
                                        @foreach (App\Models\PropertyType::getProperties() as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md form-group">
                                    <label class="col-form-label">Property</label>
                                    <select id="properties" class="form-select" name="property_id" wire:model="property_id"></select>
                                      {{-- <select class="form-select @error('property_id') is-invalid @enderror" name="property_id" wire:model="property_id">
                                        <option value="">Select Property</option>
                                        {{-- @foreach (App\Models\Property::all() as $property)
                                            <option value="{{ $property->id }}">{{ $property->name }}</option>
                                        @endforeach --}}

                                    {{-- </select>  --}}
                                    @error('property_id') <p class="text-danger"> {{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="row">

                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Rent</label>
                                    <input name="rent" type="number" class="form-control @error('rent')is-invalid @enderror"
                                        onkeyup="word2.innerHTML=toWord(this.value)" autocomplete wire:model="rent">
                                        @error('rent') <p class="text-danger">{{ $message }}</p> @enderror
                                    <div class="border-bottom p-2">In Word: <span class="text-danger" id="word2"></span>
                                    </div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Increment (%)</label>
                                    <input name="increment" type="number" class="form-control" max="99" wire:model="increment">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Deposit Money</label>
                                    <input name="deposit" type="number" class="form-control @error('deposit')is-invalid @enderror"
                                        onkeyup="word.innerHTML=toWord(this.value)" autocomplete wire:model="deposit">
                                        @error('deposit') <p class="text-danger">{{ $message }}</p> @enderror
                                    <div class="border-bottom p-2">In Word: <span class="text-danger" id="word"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Tenant</label>
                                    <select class="form-select @error('user_id')is-invalid @enderror" name="user_id" wire:model="user_id">
                                        <option value="">Select Tenant</option>
                                        @foreach ($tenants as $tenant)
                                            <option value="{{ $tenant->id }}">{{ $tenant->fname.' '.$tenant->lname }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Period</label>
                                    <select name="period" id="" class="form-select @error('period')is-invalid @enderror" wire:model="period">
                                        <option value="1">1 Months</option>
                                        <option value="3">3 Months</option>
                                        <option value="6">6 Months</option>
                                        <option value="12">1 Year</option>
                                        <option value="24">2 Years</option>
                                    </select>
                                    @error('period') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md form-group">
                                    <label class="col-form-label">Agreement Attachment</label>
                                    <input name="agreement" type="file" class="form-control @error('agreement') is-invalid @enderror" wire:model="agreement">
                                    @error('agreement') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md form-group">
                                    <label class="col-form-label">Start Date</label>
                                    <input name="increment_at" type="date" value="{{ date('Y-m-d') }}" class="form-control" wire:model="increment_at">
                                </div>

                                <div class="col-md form-group">
                                    <label class="col-form-label">Entry by</label>
                                    <input class="form-control" value="{{ Auth::user()->fname.' '.Auth::user()->lname }}" name="entry_id" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h4>Conditions:</h4>
                                </div>
                                <div class="col-md">
                                    <div class="custom-control custom-checkbox was-validated"
                                         style="padding-left: 20px; margin-left: 20px;">
                                        <input type="checkbox" class="custom-control-input is-invalid" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2">
                                            Any Modification or damage done (without notification), the tenant has to repair or fix to its revise
                                            status it before vacating the Property or the damage fee shall be deduced from him/her.
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox was-validated"
                                         style="padding-left: 20px; margin-left: 20px;">
                                        <input type="checkbox" class="custom-control-input is-invalid" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3">
                                            Tenant has to pay any utility bills against him/her period before vacating the Property or it shall be
                                            deduced from him/her.
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox was-validated"
                                         style="padding-left: 20px; margin-left: 20px;">
                                        <input type="checkbox" class="custom-control-input is-invalid" id="customControlValidation4" required>
                                        <label class="custom-control-label" for="customControlValidation4">
                                            Tenant has to pay any rent dues against him/her during the vacating period or they shall incur penalties.
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox was-validated"
                                         style="padding-left: 20px; margin-left: 20px;">
                                        <input type="checkbox" class="custom-control-input is-invalid" id="customControlValidation5" required>
                                        <label class="custom-control-label" for="customControlValidation5">
                                            Tenant agrees that if any clause mentioned above is not adhered to, they therefore allow the owner to redeem from Security Deposit.
                                        </label>
                                    </div>
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
@endsection
