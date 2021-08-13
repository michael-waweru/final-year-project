<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();


        return view('livewire.admin.invoices', compact('invoices',));
    }

    public function add()
    {
        $landlords = DB::select('select * from users where role = 2');
        $tenants = DB::select('select * from users where role = 3');

        return view('livewire.admin.add-invoice',
            compact('landlords','tenants'));
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
        return redirect()->route('admin.invoices');
    }
}
