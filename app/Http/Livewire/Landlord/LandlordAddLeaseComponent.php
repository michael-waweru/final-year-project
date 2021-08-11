<?php

namespace App\Http\Livewire\Landlord;

use App\Models\User;
use Livewire\Component;
use App\Models\Allocation;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LandlordAddLeaseComponent extends Component
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
    public $created;

    public function __construct()
    {
        //check and penalty when allocation period is over
        Allocation::whereNull('created')->each(function ($allocation) {
            if(Allocation::isExpired($allocation->id)) {
                $allocation->created = today();
                $allocation->status = false;
                $allocation->rent += ($allocation->rent * $allocation->penalty)/100;
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
        $allocation->penalty = $this->penalty;
        $allocation->created = $this->created;
        $allocation->save();

        session()->flash('success', 'Success! Lease Created successfully.');
        return redirect()->route('landlord.myleases');
    }


    public function render()
    {
        $tenants = User::where('entry_id', '=', auth()->user()->id)->get();        
        $types = PropertyType::all();

        return view('livewire.landlord.landlord-add-lease-component',
        [
            'tenants' => $tenants,
            'types' => $types
            
        ])->layout('layouts.landlord');
    }
}
