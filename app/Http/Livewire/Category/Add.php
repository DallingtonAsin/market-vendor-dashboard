<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class Add extends Component
{
    public function render()
    {
        return view('livewire.category.add')
                ->layout('layouts.app');;
    }
}
