<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use Helper;

class IncomesChart extends Component
{
    public function render()
    {
        $data = $this->getMonthlyIncomeData();
        return view('livewire.reports.incomes-chart', ['chartdata' => $data]);
    }

    public function getMonthlyIncomeData(){
            $data = Helper::getMonthlyIncomeReviewData();
            return $data;
     }
}
