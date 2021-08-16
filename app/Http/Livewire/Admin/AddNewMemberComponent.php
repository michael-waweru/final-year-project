<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AddNewMemberComponent extends Component
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
            'role' => 'required',
            'contact' => 'required | numeric',
            'guarantor_fname' => 'required',
            'guarantor_lname' => 'required',
            'guarantor_contact' => 'required'
        ]);
    }
    public function storeMember(Request $request)
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
            'guarantor_contact' => 'required | numeric'
        ]);

        $member = new User();

        // if(isset($request->member->identification_doc))
        // {
        //     $docName = Carbon::now()->timestamp. '.' .$request->member->identification_doc->extension();
        //     $url = $request->member->identification_doc->storeAs('member-documents', $docName);
        //     $member->identification_doc = $url;
        // }

        if( isset($request->member->identification_doc))
        {
            $docName = Carbon::now()->timestamp. '.' .$request->member->identification_doc->extension();
            $url = $request->member->identification_doc->storeAs('member-doc', $docName);
            $member->identification_doc = $url;
        }

        $member->fname = $this->fname;
        $member->lname = $this->lname;
        $member->email = $this->email;
        $member->password = Hash::make($this->password);
        $member->address = $this->address;
        $member->identification_number = $this->identification_number;
        $member->identification_doc = $this->identification_doc;
        $member->contact = $this->contact;
        $member->role = $this->role;
        $member->guarantor_fname = $this->guarantor_fname;
        $member->guarantor_lname = $this->guarantor_lname;
        $member->guarantor_id_no = $this->guarantor_id_no;
        $member->guarantor_contact = $this->guarantor_contact;
        $member->guarantor_address = $this->guarantor_address;
        $member->save();

        Password::sendResetLink($request->only('email'));

        session()->flash('success', 'Member Added Successfully.');
        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('livewire.admin.add-new-member-component')->layout('layouts.admin');
    }
}
