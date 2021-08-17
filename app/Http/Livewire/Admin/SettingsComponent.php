<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SettingsComponent extends Component
{
    public function render()
    {
        $users = User::where('role', '>', 1)->count();
        $landlords = DB::table('users')->where('role',  2)->count();
        $tenants = DB::table('users')->where('role',  3)->count();
        $properties = DB::table('properties')->count();

        return view('livewire.admin.settings-component',
        [
            'users' => $users,
            'landlords' => $landlords,
            'tenants' => $tenants,
            'properties' => $properties

        ])->layout('layouts.admin');
    }
}
