<?php

namespace App\Http\Livewire\Parking;
use App\DataTables\ParkingFeesDataTable;
use Livewire\Component;

class ParkingFees extends Component
{
    public function render()
    {
        return view('livewire.parking.parking-fees');
    }

    public function fetchAjaxRequest(ParkingFeesDataTable $dataTable){
        try {
            return $dataTable->render('livewire.parking.parking-fees');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }


}
