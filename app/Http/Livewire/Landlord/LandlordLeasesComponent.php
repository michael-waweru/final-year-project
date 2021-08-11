<?php

namespace App\Http\Livewire\Landlord;

use Livewire\Component;
use App\Models\Allocation;

class LandlordLeasesComponent extends Component
{
    public function render()
    {
        $allocations = Allocation::where('entry_id', auth()->user()->id)->get();

        return view('livewire.landlord.landlord-leases-component',
        [
            'allocations' => $allocations
        ])->layout('layouts.landlord');
    }
}
