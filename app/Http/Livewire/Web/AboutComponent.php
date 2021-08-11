<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        return view('livewire.web.about-component')->layout('layouts.base2');
    }
}
