@extends('layouts.landlord2')

@section('content')
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">Expenses</h3>
        </div>
        <div class="simple-card">

            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                       role="tab" aria-controls="home" aria-selected="true">List</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                       aria-controls="profile" aria-selected="false">Add an Expense</a>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent5">
                <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                    <div class="card">
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Nature of Expense</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td class="text-center">{{ $expense->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">{{ $expense->name}}</td>
                                        <td class="text-danger text-center">{{ $expense->amount }}</td>
                                        <td class="text-center">{{ $expense->description }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('landlord.expense.edit', $expense->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" onclick="deleteConfirmation( {{ $expense->id }} )"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('landlord.expense.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md">
                                        <label class="col-form-label">Serial No.
                                            <input type="number" name="serial" value="{{ $id = App\Models\Expense::nextId() }}" class="form-control" {{ $id ? 'disabled':'' }}>
                                        </label>
                                    </div>

                                    <div class="form-group col-md">
                                        <label class="col-form-label">Expense Type
                                            <input name="name" type="text" class="form-control" placeholder="Enter Nature of expense. E.g Internet Provider, Water Supplier" required>
                                        </label>
                                    </div>

                                    <div class="form-group col-md">
                                        <label class="col-form-label">Amount
                                            <input name="amount" type="number" class="form-control" onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                            <div class="border-bottom bg-light p-2">In Word: <span class="text-danger" id="word"></span></div>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label">Description</label>
                                        <textarea name="description" class="form-control" cols="15" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-primary">Save Expense</button>
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
    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Delete?",
                icon: 'question',
                text: "Are you sure you wanna delete Expense Entry?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/expense/delete')}}/" + id,
                        data: { _token: CSRF_TOKEN },
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Success!", results.message, "success");
                                location.reload(), 3000;
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
    </script>
@endsection
