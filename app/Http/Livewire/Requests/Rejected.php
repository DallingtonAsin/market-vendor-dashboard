<?php

namespace App\Http\Livewire\Requests;

use Livewire\Component;
use App\DataTables\Requests\RejectedRequestsDataTable;

class Rejected extends Component
{
    public function render()
    {
        return view('livewire.requests.rejected');
    }

    public function fetchAjaxRequest(RejectedRequestsDataTable $dataTable){
        try {
                return $dataTable->render('livewire.requests.rejected');
            } catch (\Exception $ex) {
                dd($ex->getMessage());
            }
}
}
