<?php

namespace App\Http\Livewire\Admin;

use App\Models\Location;
use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditPropertyComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $price;
    public $garage;
    public $property_type_id;
    public $property_id;
    public $status;
    public $description;
    public $year_built;
    public $bedrooms;
    public $image;
    public $newimage;
    public $location_id;
    public $precise_location;
    public $school;
    public $medical;
    public $church;

    public function mount($property_slug)
    {
        $property = Property::where('slug',$property_slug)->first();
        $this->property_id = $property->id;
        $this->name = $property->name;
        $this->slug = $property->slug;
        $this->price = $property->price;
        $this->property_type_id = $property->property_type_id;
        $this->garage = $property->garage;
        $this->status = $property->status;
        $this->description = $property->description;
        $this->year_built = $property->year_built;
        $this->bedrooms = $property->bedrooms;
        $this->image = $property->image;
        $this->location_id = $property->location_id;
        $this->pool = $property->pool;
        $this->location_id = $property->location_id;
        $this->precise_location = $property->precise_location;
        $this->school = $property->school;
        $this->medical = $property->medical;
        $this->church = $property->church;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required | numeric',
            'garage' => 'required',
            'property_type_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'year_built' => 'required',
            'bedrooms' => 'required',
            // 'newimage' => 'required | mimes:jpeg,png',
            'location_id' => 'required',
            'precise_location' => 'required',
            'school' => 'required',
            'medical' => 'required',
            'church' => 'required'
        ]);
    }

    public function updateProperty()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required | numeric',
            'garage' => 'required',
            'status' => 'required',
            'property_type_id' => 'required',
            'description' => 'required',
            'year_built' => 'required',
            'bedrooms' => 'required',
            //'newimage' => 'required | mimes:jpeg,png',
            'location_id' => 'required',
            'precise_location' => 'required',
            'school' => 'required',
            'medical' => 'required',
            'church' => 'required'
        ]);

        $property = Property::find($this->property_id);
        $property->name = $this->name;
        $property->slug = $this->slug;
        $property->price = $this->price;
        $property->property_type_id = $this->property_type_id;
        $property->description = $this->description;
        $property->bedrooms = $this->bedrooms;
        $property->garage = $this->garage;
        $property->status = $this->status;
        $property->year_built = $this->year_built;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('real',$imageName);
            $property->image = $imageName;
        }
        $property->location_id = $this->location_id;
        $property->precise_location =$this->precise_location;
        $property->school = $this->school;
        $property->medical =$this->medical;
        $property->church = $this->church;
        $property->save();

        session()->flash('success', 'Success! Property has been updated successfully.');
        return redirect()->route('admin.properties');
    }

    public function render()
    {
        $locations = Location::all();
        $types = PropertyType::all();
        return view('livewire.admin.edit-property-component',
        [
            'locations' => $locations,
            'types' => $types
        ])->layout('layouts.admin');
    }
}
