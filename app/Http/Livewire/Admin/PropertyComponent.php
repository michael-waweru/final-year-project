<?php

namespace App\Http\Livewire\Admin;

use App\Models\Property;
use App\Models\PropertyType;
use Livewire\Component;

class PropertyComponent extends Component
{

    public function render()
    {
        $properties = Property::all();
        $types = PropertyType::all();
        return view('livewire.admin.property-component',
        [
            'properties' => $properties,
            'types' => $types
        ])->layout('layouts.admin');
    }
}
