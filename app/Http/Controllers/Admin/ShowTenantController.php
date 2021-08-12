<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowTenantController extends Controller
{
    public function show(User $tenant)
    {
        return view('livewire.admin.showtenant',compact('tenant'));
    }

}
