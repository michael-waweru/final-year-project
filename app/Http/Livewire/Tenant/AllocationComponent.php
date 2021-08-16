<?php

namespace App\Http\Livewire\Tenant;

use App\Models\Allocation;
use Livewire\Component;

class AllocationComponent extends Component
{
    public function render()
    {
        $leases = Allocation::where('user_id', '=', auth()->user()->id)->get();

        return view('livewire.tenant.allocation-component',
        [
            'leases' => $leases

        ])->layout('layouts.tenant');
    }
}
