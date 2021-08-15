<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::where('entry_id', '=', auth()->user()->id)->get();
        return view('livewire.landlord.expenses', compact('expenses'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            "name" => "required",
            "amount" => "required|integer"
        ]);

        $expense = new Expense();
        $expense->id = $request->serial;
        $expense->name = $request->name;
        $expense->entry_id = Auth::id();
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->save();

        session()->flash('success', 'Expense has been stored');
        return redirect()->route('landlord.expenses');
    }

    public function edit(Expense $expense)
    {
        return view('livewire.landlord.edit-expense', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            "name" => "required|string",
            "amount" => "required|integer",
        ]);

        $expense->name = $request->name;
        $expense->entry_id = Auth::id();
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->save();

        session()->flash('success', 'Expense Updated Successfully');
        return redirect(route('landlord.expenses'));
    }

    public function destroy($id)
    {
        $delete = Expense::find($id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Expense Entry deleted successfully";
        } else {
            $success = true;
            $message = "Entry not found!";
        }
        //  Return response
        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }
}
