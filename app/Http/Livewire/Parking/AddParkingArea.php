<?php

namespace App\Http\Livewire\Parking;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use App\Models\Client;

class AddParkingArea extends Component
{

    public $client_id, $name, $address, $description, $opens_at, $closes_at,
    $latitude, $longitude, $total_space;
    public function render()
    {
        $clients = Client::all();
        return view('livewire.parking.add-parking-area')
               ->with(compact('clients'));

    }

    public function resetInputFields(){
        $this->client_id = '';
        $this->name = '';
        $this->address = '';
        $this->description = '';
        $this->opens_at = '';
        $this->closes_at = '';
        $this->latitude = '';
        $this->longitude = '';
        $this->total_space = '';
    }

    public function store(){

        $reqParams = $this->validate([
          'client_id' => 'required',
          'name' => 'required',
          'address' => 'required',
          'description' => 'required',
          'opens_at' => 'required',
          'closes_at' => 'required',
          'latitude' => 'required',
          'longitude' => 'required',
          'total_space' => 'required',
      ]);
        // dd($reqParams);
        try{

            $endPoint = '/parking_areas';
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

public function changeParkingAreaEvent($parking_area_id){
            $address = Client::where('id', $parking_area_id)->value('address');
            $this->address = $address;
}






}
