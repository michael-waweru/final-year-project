<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\PaymentRefund;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakePaymentController extends Controller
{
    public function index()
    {
        $payments = Payments::where('entry_id', '=', auth()->user()->id)->get();
        $refunds = PaymentRefund::where('entry_id', '=', auth()->user()->id)->get();
        $allocations = Allocation::where('entry_id', '=', auth()->user()->id)
            ->where('status',1)->get();

        return view('livewire.landlord.payments',
            compact('payments', 'allocations','refunds'));
    }

    public function store(Request $request)
    {
        $allocation = Allocation::findOrFail($request->allocation_id);

        $payment = new Payments();
        $payment->id = $request->serial;
        $payment->allocation_id = $request->allocation_id;
        $payment->landlord_id = $request->landlord_id;
        $payment->entry_id = Auth::id();
        $payment->type = $request->type;
        $payment->state = 'payment';
        $payment->amount = $request->amount;
        $payment->payment_means = $request->payment_means;
        $payment->transaction_code = $request->transaction_code;
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

        session()->flash('success', 'Success. Payment Made Successfully!');
        return redirect()->back();
    }

    public function rentPayment($request, $payment)
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

    public function show(Payments $payment)
    {
        return view('livewire.landlord.show-payment',compact('payment'));
    }
}
