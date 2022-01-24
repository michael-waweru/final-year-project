<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Support\Str;
use App\Models\PropertyType;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AddPropertyComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $price;
    public $garage;
    public $property_type_id;
    public $status;
    public $description;
    public $year_built;
    public $landlord;
    public $bedrooms;
    public $image;
    public $location_id;
    public $deposit;
    public $precise_location;
    public $school;
    public $medical;
    public $church;
    public $created_at;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required | unique:properties',
            // 'price' => 'required | numeric',
            'garage' => 'required',
            'property_type_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'landlord' => 'required',
            'year_built' => 'required',
            'bedrooms' => 'required',
            'image' => 'required | mimes:jpeg,png',
            'location_id' => 'required',
            'precise_location' => 'required',
            'school' => 'required',
            'medical' => 'required',
            'church' => 'required'
        ]);
    }

    public function addProperty()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required | unique:properties',
            'garage' => 'required',
            'status' => 'required',
            'property_type_id' => 'required',
            'description' => 'required',
            'year_built' => 'required',
            'landlord' => 'required',
            'bedrooms' => 'required',
            'image' => 'required | mimes:jpeg,png',
            'location_id' => 'required',
            'precise_location' => 'required',
            'school' => 'required',
            'medical' => 'required',
            'church' => 'required',
            'price' => 'required | integer'

        ]);

        // $this->validate([]);

        $property = new Property();
        $property->name = $this->name;
        $property->slug = $this->slug;
        $property->price = $this->price;
        $property->year_built = $this->year_built;
        $property->description = $this->description;
        $property->landlord = $this->landlord;
        $property->property_type_id = $this->property_type_id;
        $property->bedrooms = $this->bedrooms;
        $property->status = $this->status;
        $property->garage = $this->garage;
        $property->location_id = $this->location_id;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('real', $imageName);
        $property->image = $imageName;
        $property->precise_location =$this->precise_location;
        $property->school = $this->school;
        $property->medical =$this->medical;
        $property->church = $this->church;
        $property->created_at = $this->created_at;
        $property->save();

        session()->flash('success', 'Success! Property has been created successfully.');
        return redirect()->route('admin.properties');
    }

    public function render()
    {
        $locations = Location::all();
        $types = PropertyType::all();
        //$landlords = User::where('role', '=', 2)->get();
        $landlords = DB::select('select * from users where role = 2');

        return view('livewire.admin.add-property-component',
        [
            'locations' => $locations,
            'types' => $types,
            'landlords' => $landlords
        ])->layout('layouts.admin');
    }
}
