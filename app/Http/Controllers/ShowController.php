<?php

namespace App\Http\Controllers;

use App\Models\Allocation;

class ShowController extends Controller
{
    public function show(Allocation $allocation)
    {
        return view('livewire.tenant.show-lease', compact('allocation'));
    }
}
