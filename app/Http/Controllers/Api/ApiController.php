<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //get property by type
    public function properties(Request $request)
    {
        if ($request)
        {
            $properties = Property::where('property_type_id', $request->type)->get();
            if ($properties)
            {
                return response()->json($properties);
            }
        }
    }
}
