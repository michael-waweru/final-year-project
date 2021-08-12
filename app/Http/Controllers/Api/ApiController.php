<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Payments;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //get property by type
    public function properties(Request $request)
    {
        if ($request)
        {
//            $properties = Property::where('property_type_id', $request->type)->get();
            $properties = DB::table('properties')
                                    ->where('landlord', '=', auth()->user()->id)
                                    ->where('property_type_id', $request->type)->get();
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
            $data['tenant'] = $allocation->tenant->fname.' '.$allocation->tenant->lname;
            $data['rent'] = $allocation->rent;
            $data['increment'] = $allocation->increment;
            $data['start'] = $allocation->created_at->diffForHumans();
            $data['duration'] = $allocation->period;
            $data['left'] = $allocation->period - $allocation->created_at->diffInMonths(now());

            if($data){
                return response()->json($data);
            }
        }
    }

    public function paymentInfo(Request $request)
    {
        $data = [];
        $payment = Payments::find($request->payment);
        $data['paid'] = $payment->amount;
        $data['for'] = $payment->type;
        $data['mpesa'] = $payment->transaction_code ?? 'Other Payment Method';

        if($data){
            return response()->json($data);
        }
    }
}
