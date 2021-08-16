<?php

namespace App\Http\Livewire\Tenant;

use Livewire\Component;

class CalendarComponent extends Component
{
    public function render()
    {
        return view('livewire.tenant.calendar-component')->layout('layouts.tenant');
    }
}
