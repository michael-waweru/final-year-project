<?php

namespace App\Http\Livewire\Landlord;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;
    public $name;
    public $email;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'current_password' => 'required',
            'password' => 'required |min:8 |confirmed |different:current_password',
            'name' => 'required',
            'email' => 'required | email'
        ]);
    }

//    public function updateProfile()
//    {
//        $this->validate([
//            'name' => 'required',
//            'email' => 'required | email'
//        ]);
//
//        $user = User::find($this->user_id);
//        $user->name = $this->name;
//        $user->email = $this->email;
//        $user->save();
//        session()->flash('message', 'Success! Details have been updated Successfully');
//    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required |min:8 |confirmed |different:current_password',
        ]);

        if (Hash::check($this->current_password, Auth::user()->password))
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('success', 'Your authentication password has been updated');
        }

        else
        {
            session()->flash('error', 'Please Enter Your Current Password then new passwords');
        }
    }
    public function render()
    {
        return view('livewire.landlord.change-password-component')->layout('layouts.landlord');
    }
}
