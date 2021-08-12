<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentRefund;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefundController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'payment_id' => 'required|integer',
            'amount' => 'required|integer|lte:paid',
            'refund_method' => 'required',
        ]);

        if (!Payments::find($request->payment_id)) {
            return redirect()->back()->with('info', 'Payment was not found');
        }

        $refund = new PaymentRefund();
        $refund->payment_id = $request->payment_id;
        $refund->landlord_id = $request->landlord_id;
        $refund->entry_id = Auth::id();
        $refund->amount = $request->amount;
        $refund->description = $request->description;
        $refund->refund_method = $request->refund_method;

        if ($request->refund_method == 'bank') {
            $request->validate([
                'bank' => 'required|string',
                'account' => 'required|integer',
                'branch' => 'required|string',
                'cheque' => 'required|string',
            ]);

            $refund->bank = $request->bank;
            $refund->account = $request->account;
            $refund->branch = $request->branch;
            $refund->cheque = $request->cheque;
            $refund->attachment = $request->attachment;
        }
        elseif ($request->refund_method == 'm-pesa')
        {
            $request->validate([
                'transaction_code' => 'required|string'
            ]);
            $refund->transaction_code = $request->transaction_code;
        }
        $refund->save();

        session()->flash('success', 'Payment Refund Successful');
        return redirect()->back();
    }
}
