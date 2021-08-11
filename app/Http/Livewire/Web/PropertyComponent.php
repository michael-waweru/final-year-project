<?php

namespace App\Http\Livewire\Web;

use App\Models\Property;
use Livewire\Component;

class PropertyComponent extends Component
{
    public function render()
    {
        $properties = Property::orderBy('created_at', 'DESC')->get();
        // $landlord = Property::findOrFail($this->id);

        return view('livewire.web.property-component',
        [
            'properties' => $properties,
            // 'landlord' => $landlord
        ])->layout('layouts.base2');
    }
}
