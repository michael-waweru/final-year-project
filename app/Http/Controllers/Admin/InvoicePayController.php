<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoicePay;
use Illuminate\Http\Request;

class InvoicePayController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required',
            'amount' => 'required|integer',
            'entry_id' => 'required',
            'user_id' => 'required'
        ]);

        // check if request loan found or not
        if (!(Invoice::find($request->invoice_id))) {
            return redirect()->back()->with('info', 'Invoice not found!');
        }

        $payinvoice = new InvoicePay();

        // find or fail get invoice
        $invoice = Invoice::findOrFail($request->invoice_id);
        $payinvoice->balance = ($invoice->payment_amount) - ($invoice->invoicePay->sum('amount'));

        // check if invoice payment is completed
        if ($payinvoice->balance == 0) {
            return redirect()->back()->with('success', 'Invoice is fully payed');
        }

        // Check if payment being made is more than balance amount
        if ($payinvoice->balance < $request->amount) {
            return redirect()->back()->with('error', 'You can not pay more then balance amount');
        }

        // set payment counter
        $payinvoice->invoicecounter = $invoice->id . '-' . ($invoice->invoicePay->count() + 1);

        // set balance
        if ($payinvoice->balance == $request->amount) {
            $payinvoice->balance = 0;
        } else {
            $payinvoice->balance = ($payinvoice->balance) - ($request->amount);
        }

        $payinvoice->invoice_id = $request->invoice_id;
        $payinvoice->entry_id = $request->entry_id;
        $payinvoice->user_id = $request->user_id;
        $payinvoice->amount = $request->amount;
        $payinvoice->description = $request->description;
        $payinvoice->created_at = $request->created_at;
        $payinvoice->save();

        session()->flash('success', 'Invoice has been updated.');
        return redirect()->route('admin.invoices');
    }
}
