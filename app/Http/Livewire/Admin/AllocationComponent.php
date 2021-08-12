<?php

namespace App\Http\Livewire\Admin;

use App\Models\Allocation;
use App\Models\User;
use Livewire\Component;

class AllocationComponent extends Component
{
    public function __construct()
    {
        //check and impose a penalty when allocation period is over
        Allocation::whereNull('increment_at')->each(function ($allocation) {
            if(Allocation::isExpired($allocation->id)) {
                $allocation->increment_at = today();
                $allocation->status = false;
                $allocation->rent += ($allocation->rent * $allocation->increment)/100;
                $allocation->save();
            }
        });
    }

    public function deleteAllocation($id)
    {
        $allocation = Allocation::find($id);
        $allocation->delete();

        session()->flash('success', 'Allocation has been deleted sucessfully.');
        return redirect()->route('admin.agreements');
    }

    public function render()
    {   $allocations = Allocation::all();

        return view('livewire.admin.allocation-component',
        [
            'allocations' => $allocations
        ])->layout('layouts.admin');
    }
}
