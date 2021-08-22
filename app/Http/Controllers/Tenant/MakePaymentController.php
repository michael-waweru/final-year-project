<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\TenantPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakePaymentController extends Controller
{
    public function index()
    {
        $payments = TenantPayment::where('entry_id', '=', auth()->user()->id)->get();
        $invoices = Invoice::where('user_id', '=', auth()->user()->id)->get();

        return view('livewire.tenant.payments',
            compact('payments', 'invoices'));
    }

    public function store(Request $request)
    {
//        $invoice = Invoice::findOrFail($request->invoice_id);

        $payment = new TenantPayment();
        $payment->id = $request->serial;
        $payment->invoice_id = $request->invoice_id;
        $payment->entry_id = Auth::id();
        $payment->type = $request->type;
        $payment->state = 'Payment';
        $payment->amount = $request->amount;
        $payment->transaction_code = $request->transaction_code;
        $payment->payment_means = $request->payment_means;
        $payment->year = $request->year;
        $payment->month = $request->month;
        $payment->description = $request->description;
        $payment->transaction_id = uniqid();

        if ($request->type == 'Rent') {
            $this->rentPayment($request, $payment);
        }

        // PAYMENT METHODS/MEANS
        if ($request->payment_means == 'cash') {
            $this->cashPayment($request);
        }
        elseif ($request->payment_means == 'bank') {
            $this->bankPayment( $request, $payment );
        }
        elseif ($request->payment_means == 'm-pesa') {
            $this->mpesaPayment( $request, $payment );
        }

        $payment->save();

        session()->flash('success', 'Success! Payment Made Successfully!');
        return redirect()->back();
    }

    public function rentPayment( $request, $payment )
    {
        return $request->validate([
            "allocation_id" => "required|integer",
            "type" => "required|string",
            "year" => "required|integer",
            "month" => "required|array",
            "payment_means" => "required|string",
            "amount" => "required|integer",
        ]);
    }

    public function cashPayment()
    {
        //
    }

    public function mpesaPayment($request, $payment)
    {
        $payment->transaction_code = $request->transaction_code;
    }

    public function bankPayment( $request, $payment )
    {
        $payment->bank = $request->bank;
        $payment->account = $request->account;
        $payment->branch = $request->branch;
        $payment->cheque = $request->cheque;

        if ($request->file('attachment')) {
            $payment->attachment = $request->attachment->store('/cheque');
        }
    }

    public function show(TenantPayment $payment)
    {
        return view('livewire.tenant.show-payment',compact('payment'));
    }
}
