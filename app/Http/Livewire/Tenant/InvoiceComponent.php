<?php

namespace App\Http\Livewire\Tenant;

use App\Models\Invoice;
use App\Models\InvoicePay;
use App\Models\Payments;
use Livewire\Component;

class InvoiceComponent extends Component
{
    public function render()
    {
        $invoices = Invoice::where('user_id', '=', auth()->user()->id)->get();       

        return view('livewire.tenant.invocie-component',
        [
            'invoices' => $invoices
        ])->layout('layouts.tenant');
    }
}
