<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class DashboardComponent extends Component
{   
    public function render()
    {
        $members = User::orderBy('created_at', 'DESC')->get()->take(5);

        return view('livewire.admin.dashboard-component',
        [
            'members' => $members

        ])->layout('layouts.admin');
    }
}
