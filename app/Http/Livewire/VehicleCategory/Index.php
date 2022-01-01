<?php

namespace App\Http\Livewire\VehicleCategory;

use Livewire\Component;
use App\DataTables\VehicleCategoryDataTable;
use App\Helpers\ApiRequestResponse;
use Illuminate\Http\Request;
use Auth;

class Index extends Component
{

    public $user_id, $name;

    public function render()
    {
        return view('livewire.vehicle-category.index');
    }

    private function resetInputFields(){
        $this->name = '';
    }

    public function fetchAjaxRequest(VehicleCategoryDataTable $dataTable){
         return $dataTable->render('livewire.vehicle-category.index');       
     }

     public function show($id){
        $endPoint = "/vehicle-category/".$id;
        $vehicleType = ApiRequestResponse::GetDataByEndPoint($endPoint);
        $vehicleType = json_decode($vehicleType, true);
        return response()->json($vehicleType);
    }
    
    
    public function update(Request $request){
        $reqParams = $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);
        
        try{
            $id = $request->input('id');
            $reqParams['user_id'] = Auth::user()->id;
            $endPoint = "/vehicle-category/".$id;
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
            $endPoint = "/vehicle-category/".$id;
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
