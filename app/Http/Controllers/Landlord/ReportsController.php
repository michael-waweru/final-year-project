<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\InvoicePay;
use App\Models\PaymentRefund;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $data = new Collection();

        $expenses = Expense::where('entry_id', '=', auth()->user()->id)->get()
            ->each(function ($data) {
                $data->type = 'Expense';
            });
//        $expenses = Expense::all()->each(function ($data)
//        {
//            $data->type = 'Expense';
//        });

        $payments = Payments::where('entry_id', '=', auth()->user()->id)->get()
            ->each(function ($data) {
                $data->type = 'Payment';
                $data->state = true;
            });
//        $payments = Payments::all()->each(function ($data)
//        {
//            $data->type = 'Payment';
//        });

        $paymentRefunds = PaymentRefund::where('entry_id', '=', auth()->user()->id)->get()
            ->each(function ($data) {
                $data->type = 'Payment Refund';
            });
//        $paymentRefunds = PaymentRefund::all()->each(function ($data)
//        {
//            $data->type = 'Payment Refund';
//            $data->state = true;
//        });

        if($request->expense) {
            $data = $data->mergeRecursive($expenses);
        }

        if($request->payment) {
            $data = $data->mergeRecursive($payments);
        }

        if($request->refund) {
            $data = $data->mergeRecursive($paymentRefunds);
        }

//        if ($request->filled('user_id')) {
//            $data = $data->where('user_id', $request->user_id);
//        }

        if ($request->filled('from')) {
            $data = $data->where('created_at', '>=', $request->from);
        }
        if ($request->filled('to')) {
            $data = $data->where('created_at', '<=', Carbon::createFromFormat('Y-m-d', $request->to)->addDays(1));
        }

        $reports = $data->sortBy('updated_at');
        $users = User::where('id', '=', auth()->user()->id)->get();

        return view('livewire.landlord.reports', compact('reports', 'users'));
    }
}
