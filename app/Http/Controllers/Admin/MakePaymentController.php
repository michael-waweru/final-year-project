<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakePaymentController extends Controller
{
    public function index()
    {
        $payments = Payments::all();
        $landlords = User::where('role', '=', 3)->get();
        $allocations = Allocation::where('status',1)->get();

        return view('livewire.admin.payments', compact('payments','allocations', 'landlords'));
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
        $payment->means = $request->means;
        $payment->transaction_code = $request->transaction_code;
        $payment->year = $request->year;
        $payment->month = $request->month;
        $payment->description = $request->description;
        $payment->transaction_id = uniqid();

        if ($request->type == 'rent' || $request->type == 'bill') {
            $this->rentPayment($request, $payment);
        }

        // PAYMENT METHODS
        if ($request->means == 'cash') {
            $this->cashPayment($request);
        }
        elseif ($request->means == 'bank') {
            $this->bankPayment( $request, $payment );
        }
        elseif ($request->means == 'm-pesa') {
            $this->mpesaPayment( $request, $payment );
        }
//        if ($request->type == 'wallet') {
//            $allocation->wallet += $request->amount;
//            $allocation->save();
//        }

        $payment->save();

        session()->flash('success', 'Success. Payment made successfully!');
        return redirect()->back();
    }
}
