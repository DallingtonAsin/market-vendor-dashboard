<?php

namespace App\Http\Livewire\Modals\Clients;

use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public $counter = 0;
    public function render()
    {
        return view('livewire.modals.clients.delete');
    }

    public function update(){
        $this->counter++;
    }
}
