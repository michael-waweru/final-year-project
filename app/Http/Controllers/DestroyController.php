<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function deleteType($id)
    {
        $delete = PropertyType::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Type deleted successfully";
        } else {
            $success = true;
            $message = "Type not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

        return redirect()->route('admin.property.type');
    }

    public function deleteProperty($id)
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

        return redirect()->route('admin.properties');
    }

    public function deleteLocaion($id)
    {
        $delete = Location::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Location deleted successfully";
        } else {
            $success = true;
            $message = "Location not found!";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

        return redirect()->route('admin.locations');
    }


    public function deleteAllocation($id)
    {
        $delete = Allocation::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Entry deleted successfully";
        } else {
            $success = true;
            $message = "Entry not found!";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

        return redirect()->route('admin.allocation');
    }
}
