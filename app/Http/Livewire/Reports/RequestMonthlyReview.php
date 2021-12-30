<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\DataTables\Reports\MonthlyRequestDataTable;

class RequestMonthlyReview extends Component
{
    public function render()
    {
        return view('livewire.reports.request-monthly-review');
    }

    public function fetchAjaxRequest(MonthlyRequestDataTable $dataTable){
                   try {
                        return $dataTable->render('livewire.reports.request-monthly-review');
                    } catch (\Exception $ex) {
                        dd($ex->getMessage());
                    }
       }


}
