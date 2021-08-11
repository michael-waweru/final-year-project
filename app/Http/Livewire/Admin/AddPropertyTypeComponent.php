<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PropertyType;

class AddPropertyTypeComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required'
        ]);
    }

    public function storeType()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $p_type = new PropertyType();
        $p_type->name = $this->name;
        $p_type->slug = $this->slug;

        $p_type->save();
        session()->flash('success', 'Property Type has been added sucessfully.');
        return redirect()->route('admin.property.type');
    }
    public function render()
    {
        return view('livewire.admin.add-property-type-component')->layout('layouts.admin');
    }
}
