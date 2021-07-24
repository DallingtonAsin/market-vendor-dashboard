<?php

namespace App\Http\Livewire\Requests;
use App\DataTables\ParkingApprovedRequestsDataTable;
use Livewire\Component;

class Approved extends Component
{
    public function render()
    {
        return view('livewire.requests.approved');
    }

     public function fetchAjaxRequest(ParkingApprovedRequestsDataTable $dataTable){
                try {
                        return $dataTable->render('livewire.requests.approved');
                    } catch (\Exception $ex) {
                        dd($ex->getMessage());
                    }
       }
}
