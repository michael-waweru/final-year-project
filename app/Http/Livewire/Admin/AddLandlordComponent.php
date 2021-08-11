<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AddLandlordComponent extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $email;
    public $password;
    public $password_confirmation;
    public $identification_number;
    public $identification_doc;
    public $address;
    public $contact;
    public $role;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required | confirmed | min:6',
            'identification_number' => 'required | numeric',
            'identification_doc' => 'required',
            'address' => 'required',
            'role' => 'required',
            'contact' => 'required | numeric',
        ]);
    }
    public function storeLandlord(Request $request)
    {
        $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required | confirmed | min:6',
            'identification_number' => 'required | numeric',
            'identification_doc' => 'required',
            'address' => 'required',
            'role' => 'required',
            'contact' => 'required | numeric',
        ]);

        $landlord = new User();

        if(isset($request->landlord['identification_doc']))
        {
            $docName = Carbon::now()->timestamp. '.' .$request->identification_doc->extension();
            $url = $request->landlord['identification_doc']->storeAs('landlord-documents', $docName);
            $landlord->identification_doc = $url;
        }

        $landlord->fname = $this->fname;
        $landlord->lname = $this->lname;
        $landlord->email = $this->email;
        $landlord->password = Hash::make($this->password);
        $landlord->address = $this->address;
        $landlord->identification_number = $this->identification_number;
        $landlord->identification_doc = $this->identification_doc;
        $landlord->contact = $this->contact;
        $landlord->role = $this->role;
        $landlord->save();

        Password::sendResetLink($request->only('email'));

        session()->flash('success', 'landlord Added Successfully.');
        return redirect()->route('admin.landlords');
    }
    public function render()
    {
        return view('livewire.admin.add-landlord-component')->layout('layouts.admin');
    }
}
