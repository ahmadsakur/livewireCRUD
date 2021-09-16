<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    public $contacts;
    public function render()
    {
        $this->contacts = Contact::latest()->get();
        return view('livewire.contact-index');
    }
}
