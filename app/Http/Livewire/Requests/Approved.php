<?php

namespace App\Http\Livewire\Requests;
use App\DataTables\Requests\ApprovedRequestsDataTable;
use Livewire\Component;

class Approved extends Component
{
    public function render()
    {
        return view('livewire.requests.approved');
    }

     public function fetchAjaxRequest(ApprovedRequestsDataTable $dataTable){
                try {
                        return $dataTable->render('livewire.requests.approved');
                    } catch (\Exception $ex) {
                        dd($ex->getMessage());
                    }
       }
}
