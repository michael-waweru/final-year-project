@extends('layouts.admin2')

@section('content')
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">Allocations</h3>
        </div>
        <div class="simple-card">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                        aria-controls="list" aria-selected="true">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#add" role="tab"
                        aria-controls="profile" aria-selected="false">Add</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="list">
                    <div class="card">

                        <div class="card-body">

                            @foreach (App\Models\Allocation::getExpired() as $allocation)
                                <div class="alert alert-danger">
                                    <span class="text-danger" style="font-weight: bolder"> ACTION NEEDED: </span>
                                    <a href="{{ route('admin.allocation.show', $allocation->id) }}" target="_blank">#{{ $allocation->id }}</a> Allocation's period is over and rent
                                    has been incremented by <span class="text-danger">{{ $allocation->increment }}%</span>.
                                    <a href="#" onclick="form{{ $allocation->id }}.submit()" class="text-success" style="font-weight: bolder">Renew Now!</a>

                                    <form id="form{{ $allocation->id }}" action="{{ route('admin.allocation.update', ['allocation'=>$allocation->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="expired" value="true">
                                    </form>
                                </div>
                            @endforeach

                            <div class="table-responsive ">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Allocation</th>
                                            <th scope="col">Property</th>
                                            <th scope="col">Rent</th>
                                            <th scope="col">Tenant</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Details</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allocations as $allocation)
                                        <tr>
                                            <td>{{ $allocation->id }}</td>
                                            <td>{{ $allocation->name }}</td>
                                            <td>{{ $allocation->property->name ?? 'Deleted'}}</td>
                                            <td>{{ $allocation->rent ?? 'Deleted' }}</td>
                                            <td>
                                                <a class="badge badge-light" href="{{ route('admin.tenant.show',$allocation->tenant->id) }}" target="_blank">{{ $allocation->tenant->fname." ".$allocation->tenant->lname }}
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="d-inline" action="{{ route('admin.allocation.update', ['allocation' => $allocation->id]) }}" method="POST">
                                                    @csrf
                                                    @if ($allocation->increment_at)
                                                        <p class="btn badge badge-danger">Expired</p>
                                                        @else
                                                            @if ($allocation->status)
                                                                <input type="hidden" name="status" value="0">
                                                                <button type="submit" class="btn badge badge-success">Active</button>
                                                            @else
                                                                <input type="hidden" name="status" value="1">
                                                                <button type="submit" class="btn badge badge-secondary">Inactive</button>
                                                            @endif
                                                    @endif
                                                </form>
                                            </td>
                                            <td>
                                                <button class="btn badge badge-secondary"
                                                    onclick="window.open('{{ route('admin.allocation.show', $allocation->id) }}', '_blank')"><i class="fas fa-eye"></i> View</button>
                                            </td>
                                            <td class="text-right">
                                                @if (!$allocation->increment_at)
                                                    <a href="{{ route('admin.allocation.edit', $allocation->id) }}" class="btn btn-sm btn-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endif

                                                <form class="d-inline" action="{{ route('admin.allocation.destroy', $allocation->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add">
                    <div class="card-body">
                        <form action="{{ route('admin.allocation.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md">
                                    <label class="col-form-label">Agreement Name</label>
                                    <input name="name" type="text" class="form-control" required>
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
                                        <select id="properties" class="form-select" name="property_id" required>
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Property Monthly Rent</label>
                                    <input name="rent" type="number" class="form-control" onkeyup="word2.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom p-2">In Words: <span class="text-danger" id="word2"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Increment (%)</label>
                                    <input name="increment" type="number" class="form-control" max="99" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Deposit Amount</label>
                                    <input name="deposit" type="number" class="form-control" onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom p-2">In Words: <span class="text-danger" id="word"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md form-group">
                                    <label class="col-form-label">Tenant</label>
                                    <select class="form-select" name="user_id" required>
                                        <option value="">Select Tenant</option>
                                        @foreach ($tenants as $tenant)
                                            <option value="{{ $tenant->id }}">{{ $tenant->fname.' '.$tenant->lname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md form-group">
                                    <label class="col-form-label">Agreement Period</label>
                                    <select name="period" id="" class="form-select">
                                        <option value="6">6 Months</option>
                                        <option value="12">1 Year</option>
                                        <option value="24">2 Years</option>
                                        <option value="36">3 Years</option>
                                        <option value="48">4 Years</option>
                                    </select>
                                </div>

                                <div class="col-md form-group">
                                    <label class="col-form-label">Attachment</label>
                                    <input name="agreement" type="file" class="form-control" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md form-group">
                                    <label class="col-form-label">Allocation Date</label>
                                    <input id="created_at" name="created_at" type="date" value="" class="form-control">
                                </div>

                                <div class="form-group col-6">
                                    <label class="col-form-label">Entry By</label>
                                    <select class="form-select" name="entry_id">
                                        <option value="">Select a Landlord</option>
                                        @foreach ($landlords as $landlord)
                                            <option value="{{ $landlord->id}}">{{ $landlord->fname.' '.$landlord->lname }}</option>
                                        @endforeach
                                    </select>
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
                                <button type="submit" class="btn btn-primary">Allocate</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

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

    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Delete?",
                icon: 'question',
                text: "Are you sure you want to delete Allocation?",
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
                        url: "{{ url('/allocation/delete')}}/" + id,
                        data: { _token: CSRF_TOKEN },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Success!", results.message, "success");
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                        e.dismiss;
                    }
            },
                function (dismiss) {
                return false;
            })
        }
    </script>
@endsection
