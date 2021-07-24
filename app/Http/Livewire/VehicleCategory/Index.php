<?php

namespace App\Http\Livewire\VehicleCategory;

use Livewire\Component;
use App\DataTables\VehicleCategoryDataTable;

class Index extends Component
{
    public function render()
    {
        return view('livewire.vehicle-category.index');
    }

    public function fetchAjaxRequest(VehicleCategoryDataTable $dataTable){
                try {
                        return $dataTable->render('livewire.vehicle-category.index');
                    } catch (\Exception $ex) {
                        dd($ex->getMessage());
                    }
       }
}
