<?php

namespace App\Http\Livewire\Tenant;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordComponentComponent extends Component
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

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required | email'
        ]);

        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        session()->flash('message', 'Success! Details have been updated Successfully');
    }

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
            session()->flash('success', 'Your password has been changed');
        }

        else
        {
            session()->flash('error', 'Error! Your passwords do not match');
        }
    }

    public function render()
    {
        return view('livewire.tenant.change-password-component-component')->layout('layouts.tenant');
    }
}
