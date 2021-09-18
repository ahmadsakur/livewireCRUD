<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $statusUpdate = false;
    public $paginate = 5;
    public $keyword;
    protected $queryString =['keyword'];
    protected $listeners = [
        'contactStored' => 'insertListener',
        'contactUpdated' => 'updateListener',
    ];

    public function mount()
    {
        # code...
        $this->keyword = request()->query('keyword', $this->keyword);
    }

    public function render()
    {
        $contacts = $this->keyword === null ? 
        Contact::latest()->paginate($this->paginate) : 
        Contact::latest()->where('name','like', '%'. $this->keyword . '%')->paginate();
        return view('livewire.contact-index', compact('contacts'));
    }

    public function getContact ($id)
    {
        # code...
        $this->statusUpdate = true;
        $data = Contact::find($id);
        $this->emit('getContact', $data);
    }

    public function destroy($id)
    {
        # code...
        if($id){
            $data = Contact::find($id);
            $data->delete();
            session()->flash('message', 'Contact\' was deleted! :)');
        }
    }
    public function insertListener($newContact)
    {
        session()->flash('message', $newContact["name"] . ' contact\' was stored! :)');
    }

    public function updateListener($updatedContact)
    {
        session()->flash('message', $updatedContact["name"] . ' contact\' was updated! :)');
    }
}
