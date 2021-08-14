<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Invoice;
use App\Models\InvoicePay;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        $invoiceupdates = InvoicePay::all();
        $landlords = DB::select('select * from users where role = 2');
        $tenants = DB::select('select * from users where role = 3');

        return view('livewire.admin.invoices',
            compact('invoices','landlords','invoiceupdates','tenants'));
    }

    public function add()
    {
        $landlords = DB::select('select * from users where role = 2');
        $tenants = DB::select('select * from users where role = 3');
        $allocations = Allocation::all();

        return view('livewire.admin.add-invoice',
            compact('landlords','tenants','allocations'));
    }

    public function view()
    {
        $invoices = Invoice::all();
        return view('livewire.admin.all-created-invoices', compact('invoices',));
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
        $invoice->landlord_id = $request->landlord_id;
        $invoice->entry_id = $request->entry_id;
        $invoice->description = $request->description;
        $invoice->amount = $request->amount;
        $invoice->payment_amount = $request->payment_amount;
        $invoice->payment_date = $request->payment_date;
        $invoice->created_at = $request->created_at;
        $invoice->save();

        session()->flash('success', 'Operation was Successful. Invoice Stored');
        return redirect()->route('admin.invoices.view');
    }

    public function edit(Invoice $invoice)
    {
       $users = User::where('role', '=', 3)->get();
        return view('livewire.admin.edit-invoice', compact('invoice', 'users'));
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
        return redirect(route('admin.invoices.view'));
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
