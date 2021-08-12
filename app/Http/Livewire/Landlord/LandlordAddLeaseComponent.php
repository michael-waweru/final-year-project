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
    public $increment;
    public $agreement;
    public $increment_at;
    public $created_at;

    public function __construct()
    {
        //check and increment when allocation period is over
        Allocation::whereNull('increment_at')->each(function ($lease) {
            if(Allocation::isExpired($lease->id)) {
                $lease->increment_at = today();
                $lease->status = false;
                $lease->rent += ($lease->rent * $lease->increment)/100;
                $lease->save();
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

        $lease = new Allocation();


        if($request->agreement)
        {
            $agreementName = Carbon::now()->timestamp. '.' . $this->agreement->extension();
            $url = $request->agreement->storeAs('allocation', $agreementName);
            $lease->agreement = $url;
        }

        // if(isset($request->agreement))
        // {
        //     $url = $request->agreement->store('/agreement-documents');
        //     $agreement->agreement = $url;
        // }

        $lease->property_id = $this->property_id;
        $lease->user_id = $this->user_id;
        $lease->entry_id = Auth::id();
        $lease->name = $this->name;
        $lease->rent = $this->rent;
        $lease->agreement = $this->agreement;
        $lease->period = $this->period;
        $lease->deposit = $this->deposit;
        $lease->increment = $this->increment;
        $lease->increment_at = $this->increment_at;
        $lease->created_at = $request->created_at;
        $lease->save();

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
