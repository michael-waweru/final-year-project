<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Str;

class AddLocationComponent extends Component
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
        return redirect()->route('admin.locations');
    }
    
    public function render()
    {
        return view('livewire.admin.add-location-component')->layout('layouts.admin');
    }
}
