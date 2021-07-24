<?php

namespace App\Http\Livewire\Parking;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use App\Models\Client;

class AddParkingArea extends Component
{

    public $client_name, $parking_area, $total_space;
    public function render()
    {
        $clients = Client::all();
        return view('livewire.parking.add-parking-area')
               ->with(compact('clients'));

    }

    public function resetInputFields(){
        $this->client_name = '';
        $this->parking_area = '';
        $this->total_space = '';
    }

    public function store(){

        $reqParams = $this->validate([
          'client_name' => 'required',
          'parking_area' => 'required',
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
}
