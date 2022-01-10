<?php

namespace App\Http\Livewire\Parking;
use App\DataTables\Parking\AreasDataTable;
use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Illuminate\Http\Request;
use Auth;

class ParkingAreas extends Component
{
    public $user_id, $name, $phone_number, $address, $description,
    $opens_at, $closes_at, $latitude, $longitude, $slots;

    public function render()
    {
        return view('livewire.parking.parking-areas');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->phone_number = '';
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

     public function show($id){
        $endPoint = "/parking-areas/".$id;
        $client = ApiRequestResponse::GetDataByEndPoint($endPoint);
        $client = json_decode($client, true);
        return response()->json($client);
    }
    
    
    public function update(Request $request){
        $reqParams = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'description' => 'required',
            'opens_at' => 'required',
            'closes_at' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'slots' => 'required',
        ]);
        
        try{
            $id = $request->input('id');
            $reqParams['user_id'] = Auth::user()->id;
            $endPoint = "/parking-areas/".$id;
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
            $endPoint = "/parking-areas/".$id;
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
