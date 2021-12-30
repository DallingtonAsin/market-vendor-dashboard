<?php

namespace App\Http\Livewire\Parking;
use App\DataTables\Parking\AreasDataTable;
use Livewire\Component;

class ParkingAreas extends Component
{
    public $user_id, $name, $address, $description,
    $opens_at, $closes_at, $latitude, $longitude, $slots;

    public function render()
    {
        return view('livewire.parking.parking-areas');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->address = '';
        $this->description = '';
        $this->opens_at = '';
        $this->closes_at = '';
        $this->latitude = '';
        $this->longitude = '';
        $this->slots = '';

    }

    public function fetchAjaxRequest(AreasDataTable $dataTable){
         return $dataTable->render('livewire.parking.parking-areas');        
     }
}
