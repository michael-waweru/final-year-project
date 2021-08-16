<?php

namespace App\Http\Livewire\Tenant;

use Livewire\Component;

class SettingsComponent extends Component
{
    public function render()
    {
        return view('livewire.tenant.settings-component')->layout('layouts.tenant');
    }
}
