<?php

namespace App\Http\Livewire\ShoppingOrders;

use Livewire\Component;
use App\DataTables\ProcessedShoppingOrdersDataTable;
use Illuminate\Http\Request;
use App\Helpers\ApiRequestResponse;
use Auth;

class Processed extends Component
{
    public function render()
    {
        return view('livewire.shopping-orders.processed');
    }

    public function fetchAjaxRequest(ProcessedShoppingOrdersDataTable $dataTable){
        return $dataTable->render('livewire.shopping-orders.index');
    }
}
