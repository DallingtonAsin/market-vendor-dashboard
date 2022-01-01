<?php

namespace App\Http\Livewire\Parking;
use App\DataTables\Parking\FeesDataTable;
use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Illuminate\Http\Request;
use Auth;


class ParkingFees extends Component
{
    public $user_id, $fee_per_hour;

    public function render()
    {
        return view('livewire.parking.parking-fees');
    }

    private function resetInputFields(){
       $this->fee_per_hour = '';
    }

    public function fetchAjaxRequest(FeesDataTable $dataTable){
      return $dataTable->render('livewire.parking.parking-fees');
    }

    public function show($id){
      $endPoint = "/parking-fees/".$id;
      $client = ApiRequestResponse::GetDataByEndPoint($endPoint);
      $client = json_decode($client, true);
      return response()->json($client);
  }
  
  
  public function update(Request $request){
      $reqParams = $request->validate([
          'id' => 'required',
          'fee_per_hour' => 'required',
      ]);
      
      try{
          $id = $request->input('id');
          $reqParams['user_id'] = Auth::user()->id;
          $endPoint = "/parking-fees/".$id;
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
          $endPoint = "/parking-fees/".$id;
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
