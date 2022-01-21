<?php

namespace App\Http\Livewire\ShoppingOrders;

use Livewire\Component;
use App\DataTables\PendingShoppingOrdersDataTable;
use Illuminate\Http\Request;
use App\Helpers\ApiRequestResponse;
use Auth;



class Pending extends Component
{
    public function render()
    {
        return view('livewire.shopping-orders.pending');
    }

    public function fetchAjaxRequest(PendingShoppingOrdersDataTable $dataTable){
        return $dataTable->render('livewire.shopping-orders.index');
    }



}
