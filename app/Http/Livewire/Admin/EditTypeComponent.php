<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PropertyType;

class EditTypeComponent extends Component
{
    public $name;
    public $slug;
    public $type_id;

    public function mount($type_slug)
    {
        $type = PropertyType::where('slug', $type_slug)->first();
        $this->type_id = $type->id;
        $this->name = $type->name;
        $this->slug = $type->slug;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required'
        ]);
    }

    public function updateType()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $type = PropertyType::find($this->type_id);
        $type->name = $this->name;
        $type->slug = $this->slug;
        $type->save();

        session()->flash('success', 'Success! Property Type Updated sucessfully.');
        return redirect(route('admin.property.type'));
    }
    public function render()
    {
        return view('livewire.admin.edit-type-component')->layout('layouts.admin');
    }
}
