<?php

namespace App\Http\Livewire\Admin;

use App\Models\Location;
use Livewire\Component;

class LocationComponent extends Component
{
    public function render()
    {
        $locations = Location::all();
        return view('livewire.admin.location-component',
        [
            'locations' => $locations
        ])->layout('layouts.admin');
    }
}
