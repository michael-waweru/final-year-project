<?php

namespace App\Http\Livewire\Tenant;

use App\Models\InvoicePay;
use Livewire\Component;

class InvoiceComponent extends Component
{
    public function render()
    {
        $invoices = InvoicePay::where('user_id', '=',auth()->user()->id)->get();

        return view('livewire.tenant.invocie-component',
        [
            'invoices' => $invoices

        ])->layout('layouts.tenant');
    }
}
