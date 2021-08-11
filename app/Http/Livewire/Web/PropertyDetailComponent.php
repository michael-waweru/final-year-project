<?php

namespace App\Http\Livewire\Web;

use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PropertyDetailComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $property = Property::where('slug', $this->slug)->first();
        // $sproperties = Property::where('location_id',2)->get();
        $sproperties = Property::where('status', '=', 'Rent')->get()->take(5);
        $rproperties = Property::orderBy('created_at', 'DESC')->get()->take(3);
        $fproperties = Property::inRandomOrder()->limit(3)->get();
        return view('livewire.web.property-detail-component',
        [
            'property' => $property,
            'sproperties' => $sproperties,
            'rproperties' => $rproperties,
            'fproperties' => $fproperties
        ])->layout('layouts.base3');
    }
}
