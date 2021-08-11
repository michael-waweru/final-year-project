<?php

namespace App\Http\Livewire\Landlord;

use Livewire\Component;

class LandlordDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.landlord.landlord-dashboard-component')->layout('layouts.landlord');
    }
}
