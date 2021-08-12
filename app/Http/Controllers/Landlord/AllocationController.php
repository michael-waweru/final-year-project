<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
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
        $leases = Allocation::all();
        //$tenants = User::where('role', 3)->get();
        $tenants = DB::table('users')->where('entry_id', '=', auth()->user()->id)->get();

        return view('livewire.landlord.landlord-add-lease-component', compact('leases','tenants'));
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
        ]);

        $lease = new Allocation();

        if($request->agreement)
        {
            $agreementName = Carbon::now()->timestamp. '.' .$request->agreement->extension();
            $url = $request->agreement->storeAs('allocation', $agreementName);
            $lease->agreement = $url;
        }

        $lease->property_id = $request->property_id;
        $lease->user_id = $request->user_id;
        $lease->entry_id = Auth::id();
        $lease->name = $request->name;
        $lease->rent = $request->rent;
        $lease->period = $request->period;
        $lease->deposit = $request->deposit;
        $lease->increment = $request->increment;
//        $lease->increment_at = $request->increment_at;
        $lease->created_at = $request->created_at;
        $lease->save();

        session()->flash('success', 'Allocation Saved Successfully!');
        session()->flash('error', 'Allocation was not Saved!');

        return redirect()->route('landlord.myleases');
    }

    public function update(Request $request, Allocation $lease)
    {
        # for update status only
        if ($request->has('status')) {
            $lease->status = $request->status;
            $lease->save();

            session()->flash('success','Status Updated Successfully');
            return redirect(route('landlord.myleases'));
        }

        # for renew an agreement
        if (request()->expired) {
            $lease->created_at = now();
            $lease->status = 1;
            $lease->increment_at = null;
            $lease->save();

            session()->flash('success','Allocation has Been Renewed Successfully');
            return redirect(route('landlord.myleases'));
        }

        $lease->property_id = $request->property_id;
        $lease->user_id = $request->user_id;
        $lease->entry_id = Auth::id();
        $lease->name = $request->name;
        $lease->rent = $request->rent;
        $lease->period = $request->period;
        $lease->deposit = $request->deposit;
        $lease->increment = $request->increment;
        $lease->increment_at = $request->increment_at;
        $lease->created_at = $request->created_at;
        $lease->save();

        # if attachment available
        if ($request->attachment)
        {
            $url = $request->attachment->store('/agreement');
            $lease->attachment = $url;
        }

        session()->flash('success', 'Lease Updated Successfully!');
        return redirect(route('landlord.myleases'));
    }

    public function edit(Allocation $lease)
    {
        $tenants = DB::select('select * from users where role = 3');

        return view('livewire.landlord.edit-lease', compact('lease', 'tenants'));
    }

    public function show(Allocation $lease)
    {
        return view('livewire.landlord.show-allocation',compact('lease'));
    }

    public function destroy(Allocation $lease): \Illuminate\Http\RedirectResponse
    {
        $lease->delete();

        session()->flash('success', 'Success! Allocation has been Vacated');
        return redirect()->back();
    }
}
