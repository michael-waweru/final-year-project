<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Communication;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunicationController extends Controller
{
    public function edit(Communication $memo)
    {
        $properties = Property::where('landlord', '=', auth()->user()->id)->get();
        $tenants = User::where('entry_id', '=', auth()->user()->id)->get();

        return view('livewire.landlord.edit-communication-component',
            compact('memo','properties', 'tenants'));
    }

    public function update(Request $request, Communication $memo)
    {

        $request->validate([
            'user_id' => 'required',
            'property_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $memo->user_id = $request->user_id;
        $memo->name = $request->name;
        $memo->title = $request->title;
        $memo->property_id = $request->property_id;
        $memo->description = $request->description;
        $memo->entry_id = Auth::id();
        $memo->save();

        session()->flash('success', 'Memo Updated Successfully');
        return redirect(route('landlord.communications'));
    }

    public function destroy($id)
    {
        $delete = Communication::find($id)->delete();

        // check data deleted or not
        $success = true;
        if ($delete == 1) {
            $message = "Memo deleted successfully";
        } else {
            $message = "Memo not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
