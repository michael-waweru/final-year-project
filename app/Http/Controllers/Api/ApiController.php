<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Invoice;
use App\Models\Payments;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //Get Property Information
    public function propertyInfo(Request $request)
    {
        $data = [];
        $property = Property::find($request->property);
        $data['rent'] = $property->price;

        if($data){
            return response()->json($data);
        }
    }

    //get property by type
    public function properties(Request $request)
    {
        if ($request)
        {
            $properties = Property::where('property_type_id', $request->type)->get();
//            $properties = DB::table('properties')
//                                    ->where('landlord', '=', auth()->user()->id)
//                                    ->where('property_type_id', $request->type)->get();
            if ($properties)
            {
                return response()->json($properties);
            }
        }
    }

    // get allocation information
    public function allocationInfo(Request $request)
    {
        if($request->has('allocation')){
            $allocation = Allocation::find($request->allocation);

            $data = [];
            $data['type'] = $allocation->property->property_type->name ?? 'Deleted';
            $data['property'] = $allocation->property->name;
            $data['tenant'] = $allocation->tenant->fname.' '.$allocation->tenant->lname;
            $data['rent'] = $allocation->rent;
            $data['landlord'] = $allocation->landlord->fname.' '.$allocation->landlord->lname;
//            $data['landlord'] = $allocation->entry_id;
            $data['increment'] = $allocation->increment;
            $data['start'] = $allocation->created_at->diffForHumans();
            $data['duration'] = $allocation->period;
            $data['left'] = $allocation->period - $allocation->created_at->diffInMonths(now());

            if($data){
                return response()->json($data);
            }
        }
    }

    //Get payment Information
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

    // GET INVOICE BALANCE
    public function invoiceInfo(Request $request)
    {
        $data = [];

        $invoice = Invoice::findOrFail($request->invoice);
        $data['invoiced'] = $invoice->payment_amount;
        $data['paid'] = $invoice->invoicePay->sum('amount');
        $data['tenant'] = $invoice->tenant->fname.' '.$invoice->tenant->lname;
        $data['landlord'] = $invoice->owner->fname.' '.$invoice->owner->lname;
        $data['balance'] = ($data['invoiced'] - $data['paid']);

        if ($data)
        {
            return response()->json($data);
        }
    }
}
