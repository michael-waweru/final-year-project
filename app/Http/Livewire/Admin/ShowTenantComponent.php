<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShowTenantComponent extends Component
{
    // public function store(Tenant $tenant)
    // {
    //     return view('livewire.admin.show-tenant-component',compact('tenant'));
    // }

    public function render(Tenant $tenant)
    {
        $tenant = DB::table('tenants')->where('id', '=', $this->id)->get();
        // $tenant =Tenant::all();

        return view('livewire.admin.show-tenant-component',
        [
            'tenant' => $tenant
        ])->layout('layouts.admin');
    }
}
