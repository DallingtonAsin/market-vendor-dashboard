<?php

namespace App\Http\Livewire\Parking;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use App\Models\VehicleCategory;
use App\Models\Client;
use App\Models\ParkingArea;

class AddParkingFee extends Component
{
    public $client, $parking_area, $vehicle_category, $fee;
    public $parking_areas = [];
    public function render()
    {
        $vehicle_categories = VehicleCategory::all();
        $clients = Client::all();
        return view('livewire.parking.add-parking-fee')
        ->with(compact('vehicle_categories', 'clients'));
    }

    public function resetInputFields(){
        $this->client = '';
        $this->parking_area = '';
        $this->vehicle_category = '';
        $this->fee = '';
    }

    public function store(){

        $reqParams = $this->validate([
          'client' => 'required',
          'parking_area' => 'required',
          'vehicle_category' => 'required',
          'fee' => 'required',
      ]);

        try{

            $endPoint = '/parking_fees';
            $resp = ApiRequestResponse::PostDataByEndPoint($endPoint, $reqParams);
            $apiResult = json_decode($resp, true);
            $statusCode = $apiResult['statusCode'];
            $message = $apiResult['message'];
            $data = $apiResult['data'];

            if($statusCode == '1'){
             session()->flash('success', $message);
             $this->resetInputFields();
         }else{
            session()->flash('error',   $message);
        }

    }catch(\Exception $ex){
     session()->flash('error',   $ex->getMessage());
 }
}


public function changeClientEvent($client_id){
            $parking_areas = ParkingArea::where('client_id', $client_id)->get();
            $this->parking_areas =  $parking_areas;
}


}
