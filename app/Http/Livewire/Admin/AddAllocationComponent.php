<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Allocation;
use App\Models\PropertyType;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class AddAllocationComponent extends Component
{
    use WithFileUploads;

    public $property_id;
    public $user_id;
    public $entry_id;
    public $name;
    public $rent;
    public $period;
    public $deposit;
    public $penalty;
    public $agreement;
    public $increment_at;

    public function __construct()
    {
        //check and increment when allocation period is over
        Allocation::whereNull('increment_at')->each(function ($allocation) {
            if(Allocation::isExpired($allocation->id)) {
                $allocation->increment_at = today();
                $allocation->status = false;
                $allocation->rent += ($allocation->rent * $allocation->increment)/100;
                $allocation->save();
            }
        });
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:allocations',
            'property_id' => 'required',
            'user_id' => 'required',
            'deposit' => 'required|integer',
            'rent' => 'required|integer',
            'period' => 'required|integer',
            'agreement' => 'required'
        ]);
    }

    public function storeAllocation(Request $request)
    {
        $this->validate([
            'name' => 'required|unique:allocations',
            'property_id' => 'required',
            'user_id' => 'required',
            'deposit' => 'required|integer',
            'rent' => 'required|integer',
            'period' => 'required|integer',
            'agreement' => 'required'
        ]);

        $allocation = new Allocation();


        if($request->agreement)
        {
            $agreementName = Carbon::now()->timestamp. '.' . $this->agreement->extension();
            $url = $request->agreement->storeAs('allocation', $agreementName);
            $allocation->agreement = $url;
        }

        // if(isset($request->agreement))
        // {
        //     $url = $request->agreement->store('/agreement-documents');
        //     $agreement->agreement = $url;
        // }

        $allocation->property_id = $this->property_id;
        $allocation->user_id = $this->user_id;
        $allocation->entry_id = Auth::id();
        $allocation->name = $this->name;
        $allocation->rent = $this->rent;
        $allocation->agreement = $this->agreement;
        $allocation->period = $this->period;
        $allocation->deposit = $this->deposit;
        $allocation->increment = $this->increment;
        $allocation->increment_at = $this->increment_at;
        $allocation->save();

        session()->flash('success', 'Success! Allocation has been successful.');
        return redirect()->route('admin.allocation');
    }

    public function render()
    {
        $tenants = User::where('role', '=', 3)->get();
        // $tenants = Tenant::all();
        $types = PropertyType::all();

        return view('livewire.admin.add-allocation-component',
        [
            'tenants' => $tenants,
            'types' => $types
        ])->layout('layouts.admin');
    }
}
