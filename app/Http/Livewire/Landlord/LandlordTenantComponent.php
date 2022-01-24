<?php

namespace App\Http\Livewire\Landlord;

use App\Models\Allocation;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LandlordTenantComponent extends Component
{
    public function deleteUser($id)
    {
        $tenant = User::find($id);
        $tenant->delete();

        session()->flash('success', 'Tenant has been deleted sucessfully.');
        return redirect()->route('admin.tenants');
    }

    public function render()
    {
       $tenants = Allocation::where('entry_id', '=', auth()->user()->id)->get();

        return view('livewire.landlord.landlord-tenant-component',
        [
            'tenants' => $tenants

        ])->layout('layouts.landlord');
    }
}
