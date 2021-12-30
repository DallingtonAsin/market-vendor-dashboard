<?php

namespace App\Http\Livewire\VehicleCategory;

use Livewire\Component;
use App\DataTables\VehicleCategoryDataTable;

class Index extends Component
{

    public $user_id, $name;

    public function render()
    {
        return view('livewire.vehicle-category.index');
    }

    private function resetInputFields(){
        $this->name = '';
    }

    public function fetchAjaxRequest(VehicleCategoryDataTable $dataTable){
         return $dataTable->render('livewire.vehicle-category.index');       
     }
     
}
