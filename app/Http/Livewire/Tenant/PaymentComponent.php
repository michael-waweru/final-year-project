<?php

namespace App\Http\Livewire\Tenant;

use App\Models\PaymentRefund;
use App\Models\Payments;
use Livewire\Component;

class PaymentComponent extends Component
{
    public function render()
    {
        $payments = Payments::where('entry_id', '=', auth()->user()->id)->get();
        $refunds = PaymentRefund::where('entry_id', '=', auth()->user()->id)->get();

        return view('livewire.tenant.payment-component',
        [
            'payments' => $payments,
            'refunds'  => $refunds
        ]);
    }
}
