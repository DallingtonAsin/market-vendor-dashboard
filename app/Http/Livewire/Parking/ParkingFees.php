<?php

namespace App\Http\Livewire\Parking;
use App\DataTables\Parking\FeesDataTable;
use Livewire\Component;

class ParkingFees extends Component
{
    public $user_id, $fee_per_hour;

    public function render()
    {
        return view('livewire.parking.parking-fees');
    }

    private function resetInputFields(){
       $this->fee_per_hour = '';
    }

    public function fetchAjaxRequest(FeesDataTable $dataTable){
      return $dataTable->render('livewire.parking.parking-fees');
    }


}
