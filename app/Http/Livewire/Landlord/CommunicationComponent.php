<?php

namespace App\Http\Livewire\Landlord;

use App\Models\Communication;
use Livewire\Component;

class CommunicationComponent extends Component
{
    public function render()
    {
        $memos = Communication::where('entry_id', '=', auth()->user()->id)->get();

        return view('livewire.landlord.communication-component',
        [
            'memos' => $memos

        ])->layout('layouts.landlord');
    }
}
