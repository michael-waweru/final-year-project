<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Allocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{
    public function __construct()
    {
        //check and impose a penalty when allocation period is over
        Allocation::whereNull('created')->each(function ($allocation) {
            if(Allocation::isExpired($allocation->id)) {
                $allocation->created = today();
                $allocation->status = false;
                $allocation->rent += ($allocation->rent * $allocation->penalty)/100;
                $allocation->save();
            }
        });
    }

    public function index()
    {
        $allocations = Allocation::all();
        $tenants = User::where('role', 3)->get();
        //$tenants = Tenant::all();
        return view('livewire.admin.allocations', compact('allocations','tenants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:allocations',
            'property_id' => 'required',
            'user_id' => 'required | unique:users',
            'deposit' => 'required|integer',
            'rent' => 'required|integer',
            'period' => 'required|integer',
        ]);

        $allocation = new Allocation();

        if($request->agreement)
        {
            $agreementName = Carbon::now()->timestamp. '.' .$request->agreement->extension();
            $url = $request->agreement->storeAs('allocation', $agreementName);
            $allocation->agreement = $url;
        }

        $allocation->property_id = $request->property_id;
        $allocation->user_id = $request->user_id;
        $allocation->entry_id = Auth::id();
        $allocation->name = $request->name;
        $allocation->rent = $request->rent;
        $allocation->period = $request->period;
        $allocation->deposit = $request->deposit;
        $allocation->penalty = $request->penalty;
        $allocation->created = $request->created;
        // $allocation->created_at = $request->created_at;
        $allocation->save();

        session()->flash('success', 'Agreement Saved Sucessfully!');
        session()->flash('error', 'Agreement was not Saved!');
        return redirect()->route('admin.agreements');
    }


    public function show(User $tenant)
    {
        return view('livewire.admin.showtenant', compact('tenant'));
    }


    public function update(Request $request, Allocation $allocation)
    {
        # for update status only
        if ($request->has('status')) {
           $allocation->status = $request->status;
           $allocation->save();

          session()->flash('success','Status Updated Successfully');
        return redirect(route('admin.dashboard'));
        }

        # for renew a agreement
        if (request()->expired) {
            $allocation->created_at = now();
            $allocation->status = 1;
            $allocation->created = null;
            $allocation->save();

            session()->flash('success','Agreement Renewed Successfully');
            return redirect(route('admin.dashboard'));
        }

        $allocation->property_id = $request->property_id;
        $allocation->user_id = $request->user_id;
        $allocation->entry_id = Auth::id();
        $allocation->name = $request->name;
        $allocation->rent = $request->rent;
        $allocation->period = $request->period;
        $allocation->deposit = $request->deposit;
        $allocation->penalty = $request->penalty;
        $allocation->created = $request->created;
        $allocation->created_at = $request->created_at;
        $allocation->save();
        # if attachment available
        if ($request->attachment) {
            $url = $request->attachment->store('/agreement');
            $agreement->attachment = $url;
        }


        session()->flash('success', 'Status Updated Sucssfully!');
        return redirect(route('admin.agreements'));
    }
}
