<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShowLandlordComponent extends Component
{
    public function render(User $user)
    {
        // $user = User::findOrFail($user->id);
        $users = DB::table('users')->where('id','=', $user->id)->get();

        return view('livewire.admin.show-landlord-component',
        [
            'user' => $user
        ])->layout('layouts.admin');
    }
}
