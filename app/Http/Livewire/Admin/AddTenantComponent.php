<?php

namespace App\Http\Livewire\Admin;

// use App\Models\Tenant;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
    public $entry_id;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required | confirmed | min:6',
            'identification_number' => 'required | numeric',
            'identification_doc' => 'required',
            'address' => 'required',
            'role' => 'required',
            'contact' => 'required | numeric',
            'guarantor_fname' => 'required',
            'guarantor_lname' => 'required',
            'guarantor_contact' => 'required',
            'entry_id' => 'required'
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
            'role' => 'required',
            'contact' => 'required | numeric',
            'guarantor_fname' => 'required',
            'guarantor_lname' => 'required',
            'guarantor_contact' => 'required | numeric',
            'entry_id' => 'required'
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
            $tenant->identification_doc = $url;
        }

        $tenant->fname = $this->fname;
        $tenant->lname = $this->lname;
        $tenant->email = $this->email;
        $tenant->password = Hash::make($this->password);
        $tenant->address = $this->address;
        $tenant->identification_number = $this->identification_number;
        $tenant->identification_doc = $this->identification_doc;
        $tenant->contact = $this->contact;
        $tenant->role = $this->role;
        $tenant->guarantor_fname = $this->guarantor_fname;
        $tenant->guarantor_lname = $this->guarantor_lname;
        $tenant->guarantor_id_no = $this->guarantor_id_no;
        $tenant->guarantor_contact = $this->guarantor_contact;
        $tenant->guarantor_address = $this->guarantor_address;
        $tenant->entry_id = $this->entry_id;
        $tenant->save();

        Password::sendResetLink($request->only('email'));

        session()->flash('success', 'Tenant Added Successfully.');
        return redirect()->route('admin.tenants');
    }
    public function render()
    {
        $landlords = DB::select('select * from users where role = 2');

        return view('livewire.admin.add-tenant-component',
        [
            'landlords' => $landlords
        ])->layout('layouts.admin');
    }
}
