<?php

namespace App\Http\Livewire\Landlord;

use App\Models\Allocation;
use App\Models\Communication;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddCommunicationComponent extends Component
{
    public $name;
    public $property_id;
    public $title;
    public $description;
    public $user_id;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'property_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',

        ]);
    }
    public function storeMemo(Request $request)
    {
        $this->validate([
            'name' => 'required',
            'property_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $memo = new Communication();


        $memo->name = $this->name;
        $memo->title = $this->title;
        $memo->property_id = $this->property_id;
        $memo->entry_id = Auth::id();
        $memo->description = $this->description;
        $memo->user_id = $this->user_id;
        $memo->save();

        session()->flash('success', 'Memo has been saved Successfully.');
        return redirect()->route('landlord.communications');
    }

    public function render()
    {
        $properties = Property::where('landlord', '=', auth()->user()->id)->get();
        $tenants = User::where('entry_id', '=', auth()->user()->id)->get();

        return view('livewire.landlord.add-communication-component',
        [
            'properties' => $properties,
            'tenants' => $tenants

        ])->layout('layouts.landlord');
    }
}
