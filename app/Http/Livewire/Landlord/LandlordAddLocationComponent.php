<?php

namespace App\Http\Livewire\Landlord;

use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Str;

class LandlordAddLocationComponent extends Component
{
    public $name;
    public $slug;
    public $zip;
    public $county;
    public $country;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required | unique:locations',
            'slug' => 'required',
            'country' => 'required',
            'county' => 'required',
            'zip' => 'required | numeric'
        ]);
    }

    public function storeLocation()
    {
        $this->validate([
            'name' => 'required | unique:locations',
            'slug' => 'required',
            'country' => 'required',
            'county' => 'required',
            'zip' => 'required | numeric'
        ]);

        $location = new Location();
        $location->name = $this->name;
        $location->slug = $this->slug;
        $location->country = $this->country;
        $location->county = $this->county;
        $location->zip = $this->zip;
        $location->save();

        session()->flash('success', 'Location has been created successfully!');
        return redirect()->route('landlord.locations');
    }
    
    public function render()
    {
        return view('livewire.landlord.landlord-add-location-component')->layout('layouts.landlord');
    }
}
