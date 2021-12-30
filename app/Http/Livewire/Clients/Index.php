<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\DataTables\ClientsDataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\Client;

class Index extends Component
{

    public $client_id, $client_name;
    public $user_id, $name, $address, $mobile_number, $email;
    public $count = 0;

    public $client;

    public function mount(Client $client){
        $this->client = $client;
        $this->client_id = $client->id;
    }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.clients.index')->with(compact('clients'));
    }

    private function resetEditInputFields(){
      $this->name = '';
      $this->address = '';
      $this->mobile_number = '';
      $this->email = '';
    }

    public function fetchAjaxRequest(ClientsDataTable $dataTable){
        try {
            return $dataTable->render('livewire.clients.index');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }

    public function edit($id){
        $client = Client::find($id);
        $this->client_id = $id;
        $this->client_name = $client->name;
        $this->mobile_number = $client->mobile_number;
        $this->email = $client->email;
    }

    public function update(){

        $reqParams = $this->validate([
          'client_id' => 'required',
          'client_name' => 'required',
          'mobile_number' => 'required',
          'email' => 'required',
      ]);

        try{
            
            $client_id = $reqParams['client_id'];
            $endPoint = '/clients/'.$client_id.'';
            $resp = ApiRequestResponse::PutDataByEndPoint($endPoint, $reqParams);
            $apiResult = json_decode($resp, true);
            $statusCode = $apiResult['statusCode'];
            $message = $apiResult['message'];
            $data = $apiResult['data'];

            if($statusCode == '1'){
             session()->flash('success', $message);
             $this->resetInputFields();
             $this->dispatchBrowserEvent('closeModal');
         }else{
            session()->flash('error',   $message);
        }

    }catch(\Exception $ex){
     session()->flash('error',   $ex->getMessage());
 }
}


public function comfirmDelModal($id){
    $this->client_id = $id;
    $this->client_name = Client::find($id)->name;
}


public function delete($id){
    try{

      $reqParams = [
          'id' => $id,
      ];
      $endPoint = '/clients/'.$id.'';
      $resp = ApiRequestResponse::deleteDataByEndPoint($endPoint, $reqParams);
      $apiResult = json_decode($resp, true);
      $statusCode = $apiResult['statusCode'];
      $message = $apiResult['message'];
      $data = $apiResult['data'];
      if($statusCode == '1'){
         session()->flash('success', $message);
         $this->resetInputFields();
         $this->dispatchBrowserEvent('closeModal');
     }else{
        session()->flash('error',   $message);
    }

}catch(\Exception $ex){
 session()->flash('error',   $ex->getMessage());
}
}


public function resetInputFields(){
  $this->client_id = '';
  $this->client_name = '';
  $this->mobile_number = '';
  $this->email = '';
}




}
