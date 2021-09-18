<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contactId;

    protected $listeners = [
        'getContact' => 'showContact'
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function showContact ($data)
    {
        $this->name = $data["name"];
        $this->phone = $data["phone"];
        $this->contactId = $data["id"];

    }

    public function update ()
    {
        # code...
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|max:15'
        ]);
        if ($this->contactId) {
            # code...
            $updatedContact = Contact::find($this->contactId);
            $updatedContact->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);
        }
        
        $this->resetInput();
        $this->emit('contactUpdated', $updatedContact);
    }

    private function resetInput()
    {
        # code...
        $this->name = null;
        $this->phone = null;
    }
}
