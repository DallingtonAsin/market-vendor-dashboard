<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Illuminate\Support\Facades\Auth;

class Add extends Component
{
    public $client_name, $mobile_number, $email;

    public function render()
    {
        return view('livewire.clients.add');
    }

    public function resetInputFields(){
        $this->client_name = '';
        $this->mobile_number = '';
        $this->email = '';
    }

    public function store(){

        $reqParams = $this->validate([
          'client_name' => 'required',
          'mobile_number' => 'required',
          'email' => 'required',
      ]);
      
        try{

            $endPoint = '/clients';
            $reqParams['creator'] = Auth::user()->username;
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
