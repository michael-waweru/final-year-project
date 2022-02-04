<?php

namespace App\Http\Livewire\Tenant;

use Livewire\Component;

class TenantDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.tenant.tenant-dashboard-component')->layout('layouts.tenant');
    }
}
