<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
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

    // get agreement information
    public function allocationInfo(Request $request)
    {
        if($request->has('allocation')){
            $allocation = Allocation::find($request->allocation);

            $data = [];
            $data['type'] = $allocation->property->property_type->name ?? 'Deleted';
            $data['property'] = $allocation->property->name;
            $data['tenant'] = $allocation->user->fname.' '.$allocation->user->lname;
            $data['rent'] = $allocation->rent;
            $data['penalty'] = $allocation->penalty;
            $data['start'] = $allocation->created_at->diffForHumans();

            $data['duration'] = $allocation->period;
            $data['left'] = $allocation->period - $allocation->created_at->diffInMonths(now());
            if($data){
                return response()->json($data);
            }
        }
    }
}
