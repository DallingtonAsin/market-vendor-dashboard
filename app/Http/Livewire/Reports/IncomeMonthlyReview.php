<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\DataTables\Reports\MonthlyIncomeDataTable;

class IncomeMonthlyReview extends Component
{
    public function render()
    {
        return view('livewire.reports.income-monthly-review');
    }
   
   public function fetchAjaxRequest(MonthlyIncomeDataTable $dataTable){
                   try {
                    return $dataTable->render('livewire.reports.income-monthly-review');
                    } catch (\Exception $ex) {
                        dd($ex->getMessage());
                    }
       }


}
