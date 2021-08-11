<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use Illuminate\Http\Request;

class ShowAllocationController extends Controller
{
    public function show()
    {    $allocation = Allocation::all();
        return view('livewire.admin.showallocation', compact('allocation'));
    }
}
