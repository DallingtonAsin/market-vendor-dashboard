<?php

namespace App\Http\Livewire\VehicleCategory;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;

class Add extends Component
{
   
    public $name;

    public function render()
    {
        return view('livewire.vehicle-category.add');
    }

      public function resetInputFields(){
        $this->name = '';
    }

    public function store(){

        $reqParams = $this->validate([
           'name' => 'required'
        ]);

        try{

            $endPoint = '/vehicle_category';
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
