@extends('layouts.admin2')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="section-title">Edit Allocation</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('landlord.lease.update', $lease->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md">
                        <label class="col-form-label">Lease Name</label>
                        <input name="name" type="text" class="form-control" value="{{$lease->name}}" required>
                    </div>

                    <div class="col-md form-group">
                        <label class="col-form-label">Property Name</label>
                        <select class="form-select @error('property_id') is-invalid @enderror" name="property_id">
                            <option value="">Select Property</option>
                            @foreach (App\Models\Property::where('landlord', '=', auth()->user()->id)->get() as $property)
                                <option value="{{ $property->id }}" {{ $lease->property_id == $property->id ? 'selected' :'' }}>
                                    {{ $property->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md form-group">
                        <label class="col-form-label">Tenant</label>
                        <select class="form-select" name="user_id" required>
                            <option value="">Select Tenant</option>
                            @foreach ($tenants as $tenant)
                                <option value="{{ $tenant->id }}" {{ $tenant->id == $lease->tenant->id ? 'selected':'' }}>
                                    {{ $tenant->fname.' '.$tenant->lname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Rent</label>
                        <input name="rent" type="number" value="{{ $lease->rent }}" class="form-control"
                               onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                        <div class="border-bottom bg-light p-2">In Word: <span class="text-danger" id="word"></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Deposit</label>
                        <input name="deposit" type="number" value="{{ $lease->deposit }}" class="form-control"
                               onkeyup="word2.innerHTML=toWord(this.value)" autocomplete required>
                        <div class="border-bottom bg-light p-2">In Word: <span class="text-danger" id="word2"></span>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md form-group">
                        <label class="col-form-control">Period</label>
                        <select name="period" id="" class="form-select">
                            <option value="6">6 Months</option>
                            <option value="12">1 Year</option>
                            <option value="24">2 Years</option>
                            <option value="36">3 Years</option>
                            <option value="48">4 Years</option>
                            <option value="60">5 Years</option>
                        </select>
                    </div>
                    <div class="col-md form-group">
                        <label class="col-form-label">Increment (%)</label>
                        <input name="increment" type="number" class="form-control" value="{{ $lease->increment}}" required>
                    </div>
                    <div class="col-md form-group">
                        <label class="col-form-label">Attachment</label>
                        <input name="attachment" type="file" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md form-group">
                        <label class="col-form-label">Lease Allocation Date</label>
                        <input id="created_at" name="created_at" type="date"
                               value="{{ $lease->created_at->format("Y-m-d") }}" class="form-control" required>
                    </div>

                    <div class="col-md form-group">
                        <label class="col-form-label">Entry by</label>
                        <input value="{{ Auth::user()->fname.' '.Auth::user()->lname }}" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Update Lease</button>
                </div>

            </form>
        </div>

    </div>

@endsection
