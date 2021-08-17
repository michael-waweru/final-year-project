<?php

namespace App\Http\Livewire\Landlord;

use App\Models\Property;
use Livewire\Component;

class SettingsComponent extends Component
{
    public function render()
    {
        $properties = Property::where('landlord', '=', auth()->user()->id)->count();

        return view('livewire.landlord.settings-component',
        [
            'properties' => $properties

        ])->layout('layouts.landlord');
    }
}
