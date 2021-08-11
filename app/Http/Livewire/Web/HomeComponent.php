<?php

namespace App\Http\Livewire\Web;

use App\Models\Consultation;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomeComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $location;
    public $need;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'location' => 'required',
            'need' => 'required'
        ]);
    }

    public function storeConsultation()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'location' => 'required',
            'need' => 'required'
        ]);

        $consultation = new Consultation();
        $consultation->name = $this->name;
        $consultation->email = $this->email;
        $consultation->phone = $this->phone;
        $consultation->location = $this->location;
        $consultation->need = $this->need;
        $consultation->save();

        session()->flash('success', 'Your Request has been received. We will get back to you shortly.');
        return redirect()->back();
    }

    public function render()
    {
        $rproperties = Property::orderBy('created_at', 'DESC')->get()->take(6);
        $nakuru = DB::table('locations')->where('id', '=', 1)->get('name');
        $nakuru_all = Property::where('location_id',1)->count();

        return view('livewire.web.home-component',
        [
            'rproperties' => $rproperties,
            'nakuru' => $nakuru,
            'nakuru_all' => $nakuru_all
        ])->layout('layouts.base');
    }
}
