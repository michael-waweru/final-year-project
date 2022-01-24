<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\InvoicePay;

class ShowController extends Controller
{
    public function show(Allocation $allocation)
    {
        return view('livewire.tenant.show-lease', compact('allocation'));
    }

    public function view(InvoicePay $invoice)
    {
        return view('livewire.tenant.show-invoice', compact('invoice'));
    }

    public function receipt(InvoicePay $invoice)
    {
        return view('livewire.tenant.show-receipt', compact('invoice'));
    }
}
