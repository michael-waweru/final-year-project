<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;

class DestroyController extends Controller
{
    public function deleteType($id)
    {
         //$delete = PropertyType::where('id', $id)->delete();
        $delete = PropertyType::find($id)->delete();

        // check data deleted or not
        $success = true;
        if ($delete == 1) {
            $message = "Type deleted successfully";
        } else {
            $message = "Type not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function deleteProperty($id)
    {
        $delete = Property::find($id)->delete();

        // check data deleted or not
        $success = true;
        if ($delete == 1) {
            $message = "Property deleted successfully";
        } else {
            $message = "Property not found!";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function deleteLandlord($id)
    {
        $delete = User::find($id)->delete();

        // check data deleted or not
        $success = true;
        if ($delete == 1) {
            $message = "Landlord deleted successfully";
        } else {
            $message = "Landlord not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function deleteLocation($id)
    {
        $delete = Location::where('id', $id)->delete();

        // check data deleted or not
        $success = true;
        if ($delete == 1) {
            $message = "Location deleted successfully";
        } else {
            $message = "Location not found!";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


    public function deleteAllocation($id)
    {
        $delete = Allocation::where('id', $id)->delete();

        // check data deleted or not
        $success = true;
        if ($delete == 1) {
            $message = "Entry deleted successfully";
        } else {
            $message = "Entry not found!";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
