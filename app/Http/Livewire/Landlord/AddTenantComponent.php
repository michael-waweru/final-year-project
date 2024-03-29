<?php

namespace App\Http\Livewire\Landlord;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AddTenantComponent extends Component
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
    public $guarantor_fname;
    public $guarantor_lname;
    public $guarantor_contact;
    public $guarantor_address;
    public $guarantor_id_no;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required | confirmed | min:6',
            'identification_number' => 'required | numeric',
            'identification_doc' => 'required',
            'address' => 'required',
            'contact' => 'required | numeric',
            'guarantor_fname' => 'required',
            'guarantor_lname' => 'required',
            'guarantor_contact' => 'required'
        ]);
    }
    public function storeTenant(Request $request)
    {
        $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required | confirmed | min:6',
            'identification_number' => 'required | numeric',
            'identification_doc' => 'required',
            'address' => 'required',
            'contact' => 'required | numeric',
            'guarantor_fname' => 'required',
            'guarantor_lname' => 'required',
            'guarantor_contact' => 'required | numeric'
        ]);

        $tenant = new User();

        // if(isset($request->tenant->identification_doc))
        // {
        //     $docName = Carbon::now()->timestamp. '.' .$request->tenant->identification_doc->extension();
        //     $url = $request->tenant->identification_doc->storeAs('tenant-documents', $docName);
        //     $tenant->identification_doc = $url;
        // }

        if( isset($request->tenant->identification_doc))
        {
            $docName = Carbon::now()->timestamp. '.' .$request->tenant->identification_doc->extension();
            $url = $request->tenant->identification_doc->storeAs('tenant-doc', $docName);
            $allocation->identification_doc = $url;
        }

        $tenant->fname = $this->fname;
        $tenant->lname = $this->lname;
        $tenant->email = $this->email;
        $tenant->password = Hash::make($this->password);
        $tenant->address = $this->address;
        $tenant->identification_number = $this->identification_number;
        $tenant->identification_doc = $this->identification_doc;
        $tenant->contact = $this->contact;
        $tenant->role = 3;
        $tenant->guarantor_fname = $this->guarantor_fname;
        $tenant->guarantor_lname = $this->guarantor_lname;
        $tenant->guarantor_id_no = $this->guarantor_id_no;
        $tenant->guarantor_contact = $this->guarantor_contact;
        $tenant->guarantor_address = $this->guarantor_address;
        $tenant->entry_id = Auth::id();
        $tenant->save();

        session()->flash('success', 'Tenant Added Successfully.');
        return redirect()->route('landlord.tenants');
    }

    public function render()
    {
        return view('livewire.landlord.add-tenant-component')->layout('layouts.landlord');
    }
}
