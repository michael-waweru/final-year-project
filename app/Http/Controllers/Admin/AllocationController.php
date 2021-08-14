<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AllocationController extends Controller
{
    public function __construct()
    {
        //check and impose an increment when allocation period is over
        Allocation::whereNull('increment_at')->each(function ($allocation)
        {
            if(Allocation::isExpired($allocation->id)) {
                $allocation->increment_at = today();
                $allocation->status = false;
                $allocation->rent += ($allocation->rent * $allocation->increment)/100;
                $allocation->save();
            }
        });
    }

    public function index()
    {
        $allocations = Allocation::all();
        $tenants = DB::select('select * from users where role = 3');
        $landlords = DB::select('select * from users where role = 2');

        return view('livewire.admin.allocations',
            compact('allocations','tenants', 'landlords'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:allocations',
            'property_id' => 'required',
            'user_id' => 'required',
            'deposit' => 'required|integer',
            'rent' => 'required|integer',
            'period' => 'required|integer',
            'entry_id' => 'required'
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
        $allocation->entry_id = $request->entry_id;
        $allocation->name = $request->name;
        $allocation->rent = $request->rent;
        $allocation->period = $request->period;
        $allocation->deposit = $request->deposit;
        $allocation->increment = $request->increment;
//        $allocation->increment_at = $request->increment_at;
        $allocation->created_at = $request->created_at;
        $allocation->save();

        session()->flash('success', 'Allocation Saved Successfully!');
        session()->flash('error', 'Allocation was not Saved!');

        return redirect()->route('admin.allocation');
    }

    public function update(Request $request, Allocation $allocation)
    {
        # for update status only
        if ($request->has('status')) {
            $allocation->status = $request->status;
            $allocation->save();

            session()->flash('success','Status Changed Successfully');
            return redirect(route('admin.allocation'));
        }

        # for renew an agreement
        if (request()->expired) {
            $allocation->created_at = now();
            $allocation->status = 1;
            $allocation->increment_at = null;
            $allocation->save();

            session()->flash('success','Allocation has Been Renewed Successfully');
            return redirect(route('admin.allocation'));
        }

        $allocation->property_id = $request->property_id;
        $allocation->user_id = $request->user_id;
        $allocation->entry_id = $request->entry_id;
        $allocation->name = $request->name;
        $allocation->rent = $request->rent;
        $allocation->period = $request->period;
        $allocation->deposit = $request->deposit;
        $allocation->increment = $request->increment;
        $allocation->increment_at = $request->increment_at;
        $allocation->created_at = $request->created_at;
        $allocation->save();

        # if attachment available
        if($request->agreement)
        {
            $agreementName = Carbon::now()->timestamp. '.' .$request->agreement->extension();
            $url = $request->agreement->storeAs('allocation', $agreementName);
            $allocation->agreement = $url;
        }

        session()->flash('success', 'Allocation Updated Successfully!');
        return redirect(route('admin.allocation'));
    }

    public function edit(Allocation $allocation)
    {
        $tenants = DB::select('select * from users where role = 3');
        $landlords = DB::select('select * from users where role = 2');

        return view('livewire.admin.edit-allocation',
            compact('allocation', 'tenants', 'landlords'));
    }

    public function show(Allocation $allocation)
    {
        return view('livewire.admin.show-allocation',compact('allocation'));
    }

    public function destroy(Allocation $allocation): \Illuminate\Http\RedirectResponse
    {
        $allocation->delete();

        session()->flash('success', 'Success! Allocation has been Vacated');
        return redirect()->back();
    }
}
