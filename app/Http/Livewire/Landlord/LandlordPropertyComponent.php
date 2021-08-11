<?php

namespace App\Http\Livewire\Landlord;

use App\Models\Location;
use App\Models\Property;
use Livewire\Component;

class LandlordPropertyComponent extends Component
{
    public function render()
    {
        $properties = Property::where('landlord', auth()->user()->id)->get();       

        return view('livewire.landlord.landlord-property-component',
        [
            'properties' => $properties,
            
        ])->layout('layouts.landlord');
    }
}
