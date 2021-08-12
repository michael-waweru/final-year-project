@extends('layouts.admin2')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="section-title">Edit Allocation</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.allocation.update', $allocation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md">
                        <label class="col-form-label">Allocation Name</label>
                        <input name="name" type="text" class="form-control" value="{{$allocation->name}}" required>
                    </div>
                    <div class="col-md form-group">
                        <label class="col-form-label">Property Type</label>
                        <select id="types" class="form-control" required>
                            <option>Select type</option>
                            @foreach (App\Models\PropertyType::getProperties() as $type)
                                <option value="{{ $type->id }}" {{ $allocation->type_id = $type->id ? 'selected':'' }}>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md form-group">
                        <label class="col-form-label">Property Name</label>
                        <select id="properties" class="form-control" name="property_id" required>

                        </select>
                    </div>
                    <div class="col-md form-group">
                        <label class="col-form-label">Tent</label>
                        <select class="form-control" name="tent_id" required>
                            <option value="">Select Tenant</option>
                            @foreach ($tenants as $tenant)
                                <option value="{{ $tenant->id }}" {{ $tenant->id == $allocation->user->id ? 'selected':'' }}>
                                    {{ $tenant->fname.' '.$tenant->lname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Rent</label>
                        <input name="rent" type="number" value="{{ $allocation->rent }}" class="form-control"
                               onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                        <div class="border-bottom bg-light p-2">In Word: <span class="text-danger" id="word"></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Deposit</label>
                        <input name="deposit" type="number" value="{{ $allocation->deposit }}" class="form-control"
                               onkeyup="word2.innerHTML=toWord(this.value)" autocomplete required>
                        <div class="border-bottom bg-light p-2">In Word: <span class="text-danger" id="word2"></span>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md form-group">
                        <label class="col-form-label">Period</label>
                        <select name="period" id="" class="form-control">
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
                        <input name="increment" type="number" class="form-control" value="{{$allocation->incr}}" required>
                    </div>
                    <div class="col-md form-group">
                        <label class="col-form-label">Attachment</label>
                        <input name="attachment" type="file" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md form-group">
                        <label class="col-form-label">Start Date</label>
                        <input id="created_at" name="created_at" type="date"
                               value="{{ $allocation->created_at->format("Y-m-d") }}" class="form-control" required>
                    </div>

                    <div class="col-md form-group">
                        <label class="col-form-label">Entry by</label>
                        <input value="{{ Auth::user()->name }}" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Update Allocation</button>
                </div>

            </form>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            getProperties();
        });
        $('#types').on('change', getProperties);

        function getProperties() {
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
        }
    </script>
@endsection
