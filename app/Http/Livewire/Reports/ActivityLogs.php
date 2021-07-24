<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\DataTables\ActivityLogsDataTable;

class ActivityLogs extends Component
{
    public function render()
    {
        return view('livewire.reports.activity-logs');
    }

    public function fetchAjaxRequest(ActivityLogsDataTable $dataTable){
                   try {
                        return $dataTable->render('livewire.reports.activity-logs');
                    } catch (\Exception $ex) {
                        dd($ex->getMessage());
                    }
       }
}
