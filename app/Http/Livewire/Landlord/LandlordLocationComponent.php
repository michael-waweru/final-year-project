<?php

namespace App\Http\Livewire\Landlord;

use Livewire\Component;
use App\Models\Location;

class LandlordLocationComponent extends Component
{
    public function render()
    {
        $locations = Location::all();

        return view('livewire.landlord.landlord-location-component',
        [
            'locations' => $locations
            
        ])->layout('layouts.landlord');
    }
}
