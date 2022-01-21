<?php

namespace App\Http\Livewire\ShoppingLists;

use Livewire\Component;
use App\DataTables\ShoppingListsDataTable;

class Index extends Component
{
    public function render()
    {
        return view('livewire.shopping-lists.index');
    }

    public function fetchAjaxRequest(ShoppingListsDataTable $dataTable){
        return $dataTable->render('livewire.shopping-lists.index');
    }


}
