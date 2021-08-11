<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LandlordComponent extends Component
{
    public function render()
    {
        $landlords = DB::table('users')->where('role', '=', 2)->get();
        $properties = DB::table('properties')->where('landlord', '=', $this->id)->count();

        return view('livewire.admin.landlord-component',
        [
            'landlords' => $landlords,
            'properties' => $properties
        ])->layout('layouts.admin');
    }
}
