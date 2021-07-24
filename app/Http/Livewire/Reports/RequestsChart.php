<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use Helper;

class RequestsChart extends Component
{
    public function render()
    {
        $data = $this->getMonthlyRequestsData();
        return view('livewire.reports.requests-chart', 
            ['chartdata' => $data]);
    }

     public function getMonthlyRequestsData(){
            $data = Helper::getMonthlyRequestReviewData();
            return $data;
     }


}
