<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;

class BlogComponent extends Component
{
    public function render()
    {
        return view('livewire.web.blog-component')->layout('layouts.base');
    }
}
