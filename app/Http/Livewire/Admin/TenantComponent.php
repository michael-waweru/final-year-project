<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;
use App\Models\Allocation;
use Illuminate\Support\Facades\DB;

class TenantComponent extends Component
{
    public function deleteUser($id)
    {
        $tenant = Tenant::find($id);
        $tenant->delete();

        session()->flash('success', 'Tenant has been deleted sucessfully.');
        return redirect()->route('admin.tenants');
    }

    public function render()
    {
        $tenants = DB::table('users')->where('role', '=', 3)->get();

        return view('livewire.admin.tenant-component',
        [
            'tenants' => $tenants
        ])->layout('layouts.admin');
    }
}
