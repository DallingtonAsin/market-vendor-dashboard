<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use App\DataTables\CustomersDataTable;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\ApiRequestResponse;
use Auth;


class Index extends Component
{
    public function render()
    {
        return view('livewire.customers.index');
    }

    public function fetchAjaxRequest(CustomersDataTable $dataTable){
        return $dataTable->render('livewire.users.index');
    }
}
