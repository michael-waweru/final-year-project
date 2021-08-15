@extends('layouts.landlord2')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Expense</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('landlord.expense.update',$expense->id) }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="form-group col-md">
                                <label class="col-form-label">Serial No.
                                    <input type="number" name="serial" value="{{ $expense->id }}" class="form-control" disabled>
                                </label>
                            </div>

                            <div class="form-group col-md">
                                <label class="col-form-label">Expense Type
                                    <input name="name" value="{{ $expense->name }}" type="text" class="form-control" required>
                                </label>
                            </div>

                            <div class="form-group col">
                                <label class="col-form-label">Amount
                                    <input name="amount" value="{{ $expense->amount }}" type="number" class="form-control" onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom bg-light p-2">In Word: <span class="text-danger" id="word"></span></div>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label">Description</label>
                                <textarea name="description" class="form-control" id="" cols="15" rows="5">{{ $expense->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Update Expense</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
