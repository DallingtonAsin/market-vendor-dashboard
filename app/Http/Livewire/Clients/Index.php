<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\DataTables\ClientsDataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\Client;
use Illuminate\Http\Request;
use Auth;

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

    private function resetInputFields(){
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

    public function show($id){
        $endPoint = "/clients/".$id;
        $client = ApiRequestResponse::GetDataByEndPoint($endPoint);
        $client = json_decode($client, true);
        return response()->json($client);
    }
    
    
    public function update(Request $request){
        $reqParams = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email',
        ]);
        
        try{
            $id = $request->input('id');
            $reqParams['user_id'] = Auth::user()->id;
            $endPoint = "/clients/".$id;
            $resp = ApiRequestResponse::PutDataByEndPoint($endPoint, $reqParams);
            $apiResult = json_decode($resp, true); 
            $statusCode = $apiResult['statusCode'];
            $message = $apiResult['message'];
        }catch(\Exception $ex){
            $statusCode  = 0;
            $message = $ex->getMessage();
        }
        return response()
        ->json(['statusCode' => $statusCode,
                'message' => $message,
        ]);
    }



    public function destroy(Request $request){
        $reqParams = $request->validate([
            'id' => 'required',
        ]);
        
        try{
            $id = $request->input('id');
            $reqParams['user_id'] = Auth::user()->id;
            $endPoint = "/clients/".$id;
            $resp = ApiRequestResponse::deleteDataByEndPoint($endPoint, $reqParams);
            $apiResult = json_decode($resp, true); 
            $statusCode = $apiResult['statusCode'];
            $message = $apiResult['message'];
        }catch(\Exception $ex){
            $statusCode  = 0;
            $message = $ex->getMessage();
        }
        return response()
        ->json(['statusCode' => $statusCode,
                'message' => $message,
        ]);
    }






}
