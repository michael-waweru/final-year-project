<div>
    <div class="post d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Invoice 2 main-->
            <div class="card col-12">
                <div class="section-block p-10">
                    <h3 class="section-title text-capitalize">Add New Memo
                        <a href="{{ route('landlord.communications') }}" class="btn btn-sm btn-success float-end">All Memos</a>
                    </h3>
                </div>

                <!--begin::Body-->
                <div class="card-body p-lg-10 pt-0 col-12">
                    <!--begin::Layout-->
                    <div class=" flex-column flex-xl-row col-12">
                        <form enctype="multipart/form-data" wire:submit.prevent="storeMemo">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">Name</label>
                                    <input name="name" type="text" placeholder="e.g Offer" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                    @error('name') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Memo Title</label>
                                    <input name="title" type="text" placeholder="e.g Water rates" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                                    @error('title') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">Property</label>
                                    <select class="form-select form-select-solid @error('property_id') is-invalid @enderror" wire:model="property_id" >
                                        <option value="default">Select Property</option>
                                        @foreach ($properties as $property)
                                            <option value="{{ $property->id }}">{{ $property->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('property_id') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="form-group col-6">
                                    <label class="col-form-label">Tenant</label>
                                    <select class="form-select form-select-solid @error('user_id') is-invalid @enderror" wire:model="user_id" >
                                        <option value="default">Select Tenant</option>
                                        @foreach ($tenants as $tenant)
                                            <option value="{{ $tenant->id }}">{{ $tenant->fname.' '.$tenant->lname }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id') <p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-label col-6">
                                    <label class="form-label fs-5 fw-bold mb-2">Memo Body</label>
                                    <div class="col-md-12 pl-0">
                                        <textarea class="form-control @error('description') is-invalid @enderror" cols="15" rows="5" placeholder="Property Description" wire:model="description"></textarea>
                                    </div>
                                    @error('description')<p class="text-danger">{{ $message }}</p> @enderror
                                </div>

                                <div class="form-group col-6">
                                    <label class="col-form-label">Memo By</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->fname.' '.Auth::user()->lname }}" disabled>
                                </div>
                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Save Memo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

