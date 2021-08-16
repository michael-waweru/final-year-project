<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Str;

class EditLocationComponent extends Component
{
    public $name;
    public $slug;
    public $location_id;
    public $county;
    public $country;
    public $zip;

    public function mount($location_slug)
    {
        $location = Location::where('slug', $location_slug)->first();
        $this->location_id = $location->id;
        $this->name = $location->name;
        $this->slug = $location->slug;
        $this->county = $location->county;
        $this->country = $location->country;
        $this->zip = $location->zip;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required | unique:locations',
            'slug' => 'required',
            'county' => 'required',
            'country' => 'required',
            'zip' => 'required | numeric'
        ]);
    }

    public function updateLocation()
    {
        $this->validate([
            'name' => 'required | unique:locations',
            'slug' => 'required',
            'county' => 'required',
            'country' => 'required',
            'zip' => 'required | numeric'
        ]);

        $location = Location::find($this->location_id);
        $location->name = $this->name;
        $location->slug = $this->slug;
        $location->county = $this->county;
        $location->country = $this->country;
        $location->zip = $this->zip;
        $location->save();

        session()->flash('success', 'Success! Location Updated sucessfully.');
        return redirect(route('admin.locations'));
    }

    public function render()
    {

        return view('livewire.admin.edit-location-component',
        [

        ])->layout('layouts.admin');
    }
}
