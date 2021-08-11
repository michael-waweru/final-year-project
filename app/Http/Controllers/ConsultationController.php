<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function storeConsultation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'location' => 'required',
            'need' => 'required'
        ]);

        $consultation = new Consultation();
        $consultation->name = $request->name;
        $consultation->email = $request->email;
        $consultation->phone = $request->phone;
        $consultation->location = $request->location;
        $consultation->need = $request->need;
        $consultation->save();

        session()->flash('success', 'Your Request has been received. We will get back to you shortly.');
        return redirect()->back();
    }
}
