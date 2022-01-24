<?php

namespace App\Http\Livewire\Landlord;

use App\Models\Expense;
use App\Models\PaymentRefund;
use App\Models\Payments;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LandlordDashboardComponent extends Component
{
    public function render()
    {

        $rent = Payments::where('entry_id', '=', auth()->user()->id)->count();
        $refund = PaymentRefund::where('landlord_id', '=', auth()->user()->id)->count();
        $expense = Expense::where('entry_id', '=', auth()->user()->id)->count();
        $rentPayment = Payments::where('entry_id', '=', auth()->user()->id)
                ->sum('amount');

            //$rentPayment =DB::table('payments')
            //             ->whereType('rent')->sum('amount')
            //             ->union($rent)->get();

        $rentRefund = PaymentRefund::where('landlord_id', '=', auth()->user()->id)
            ->sum('amount');
        $expenseSum = Expense::where('entry_id', '=', auth()->user()->id)
            ->sum('amount');

        return view('livewire.landlord.landlord-dashboard-component',
        [
            'rent' => $rent,
            'refund' => $refund,
            'expense' => $expense,
            'rentPayment' => $rentPayment,
            'rentRefund' => $rentRefund,
            'expenseSum' => $expenseSum
        ])->layout('layouts.landlord');
    }
}
