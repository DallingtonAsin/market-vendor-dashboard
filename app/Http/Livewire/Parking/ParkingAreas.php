<?php

namespace App\Http\Livewire\Parking;
use App\DataTables\ParkingAreasDataTable;
use Livewire\Component;

class ParkingAreas extends Component
{
    public function render()
    {
        return view('livewire.parking.parking-areas');
    }

    public function fetchAjaxRequest(ParkingAreasDataTable $dataTable){
        try {
                return $dataTable->render('livewire.parking.parking-areas');
            } catch (\Exception $ex) {
                dd($ex->getMessage());
            }
}
}
