<?php

namespace App\Http\Controllers\Landlord;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandlordController extends Controller
{
    public function delete($id)
    {
        $delete = Property::find($id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Property deleted successfully";
        } else {
            $success = true;
            $message = "Property not found!";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

        return redirect()->back();
    }

    public function show($id)
    {
        $tenant = User::where('id', $id)->get();
        return view('livewire.landlord.showtenant', compact('tenant'));
    }
}
