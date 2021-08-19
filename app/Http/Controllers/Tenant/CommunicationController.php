<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Communication;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function index()
    {
        $memos = Communication::where('user_id', '=', auth()->user()->id)->get();

        return view('livewire.tenant.communications',
        compact('memos'));
    }

    public function show(Communication $memo)
    {
        return view('livewire.tenant.show-memo',compact('memo'));
    }
}
