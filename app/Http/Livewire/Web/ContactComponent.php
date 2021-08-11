<?php

namespace App\Http\Livewire\Web;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $message;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);
    }

    public function storeMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);

        $message = new Contact();
        $message->name = $this->name;
        $message->email = $this->email;
        $message->message = $this->message;
        $message->save();

        session()->flash('success', 'Your Message has been sent successfully');
    }
    public function render()
    {
        return view('livewire.web.contact-component')->layout('layouts.base2');
    }
}
