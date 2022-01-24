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
            $invoice = Allocation::find($request->allocation);

            $data = [];
            $data['type'] = $invoice->property->property_type->name ?? 'Deleted';
            $data['property'] = $invoice->property->name;
            $data['tenant'] = $invoice->tenant->fname.' '.$invoice->tenant->lname;
            $data['rent'] = $invoice->rent;
            $data['landlord'] = $invoice->landlord->fname.' '.$invoice->landlord->lname;
//            $data['landlord'] = $invoice->entry_id;
            $data['increment'] = $invoice->increment;
            $data['start'] = $invoice->created_at->diffForHumans();
            $data['duration'] = $invoice->period;
            $data['left'] = $invoice->period - $invoice->created_at->diffInMonths(now());

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
        $data['description'] = $invoice->description;

        if ($data)
        {
            return response()->json($data);
        }
    }

    // get invoice information
    public function tenantInfo(Request $request)
    {
        if($request->has('invoice')){
            $invoice = Invoice::find($request->invoice);

            $data = [];
            $data['number'] = $invoice->id;
            $data['tenant'] = $invoice->tenant->fname.' '.$invoice->tenant->lname;
            $data['landlord'] = $invoice->landlord->fname.' '.$invoice->landlord->lname;
            $data['payment_amount'] = $invoice->payment_amount;
            $data['due'] = $invoice->payment_date->format('d-m-Y');
            $data['left'] = $invoice->payment_date->diffInDays() - $invoice->created_at->diffInDays(now());

            if($data){
                return response()->json($data);
            }
        }
    }
}
