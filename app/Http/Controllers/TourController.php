<?php

namespace App\Http\Controllers;

use App\Models\ScheduleTour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'comment' => 'required',
        ]);

        $tour = new ScheduleTour();
        $tour->name = $request->name;
        $tour->email = $request->email;
        $tour->phone = $request->phone;
        $tour->date = $request->date;
        $tour->comment = $request->comment;
        $tour->save();

        session()->flash('success', 'Request Received, We will get back to you shortly.');
        return redirect()->back();
    }
}
