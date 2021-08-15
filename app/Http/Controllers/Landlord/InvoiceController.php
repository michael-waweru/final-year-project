<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function view()
    {
        $invoices = Invoice::where('entry_id', '=', auth()->user()->id)->get();
//        $invoices = Invoice::all();

        return view('livewire.landlord.all-invoices',
            compact('invoices'));
    }

    public function add()
    {
//        $tenants = DB::select('select * from users where role = 3');
        $tenants = User::where('entry_id', '=', auth()->user()->id)->get();
        $allocations = Allocation::where('entry_id', '=', auth()->user()->id)->get();

        return view('livewire.landlord.add-invoice',
            compact('tenants','allocations'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'user_id' => 'required',
            'amount' => 'required|integer',
            'payment_amount' => 'required|integer',
            'payment_date' => 'required|date',
        ]);

        $invoice = new Invoice();
        $invoice->id = $request->serial;
        $invoice->user_id = $request->user_id;
        $invoice->entry_id = Auth::id();
        $invoice->description = $request->description;
        $invoice->amount = $request->amount;
        $invoice->payment_amount = $request->payment_amount;
        $invoice->payment_date = $request->payment_date;
        $invoice->created_at = $request->created_at;
        $invoice->save();

        session()->flash('success', 'Operation was Successful. Invoice Stored');
        return redirect()->route('landlord.invoices.view');
    }

    public function edit(Invoice $invoice)
    {
        $users = User::where('entry_id', '=', auth()->user()->id)->get();
        return view('livewire.landlord.edit-invoice', compact('invoice', 'users'));
    }

    public function update(Request $request, Invoice $invoice)
    {

        $request->validate([
            'user_id' => 'required',
            'amount' => 'required|integer',
            'payment_amount' => 'required|integer',
            'payment_date' => 'required|date',
        ]);

        $invoice->user_id = $request->user_id;
        $invoice->amount = $request->amount;
        $invoice->payment_amount = $request->payment_amount;
        $invoice->payment_date = $request->payment_date;
        $invoice->description = $request->description;
        $invoice->created_at = $request->created_at;
        $invoice->save();

        session()->flash('success', 'Invoice Updated Successfully');
        return redirect(route('landlord.invoices.view'));
    }

    public function destroy($id)
    {
        $delete = Invoice::find($id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Invoice deleted successfully";
        } else {
            $success = true;
            $message = "Invoice not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
