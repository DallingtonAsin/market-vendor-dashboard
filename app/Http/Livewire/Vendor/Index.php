<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\DataTables\VendorsDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ApiRequestResponse;
use Auth;

class Index extends Component
{
    public $model = User::class;
    
    public $user_id, $first_name, $last_name,$genderOptions,
    $phone_number, $gender, $email, $address;
    
   
    public function render()
    {
        return view('livewire.vendors.index');
    }
    
    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->phone_number = '';
        $this->gender = '';
        $this->email = '';
        $this->address = '';
    }
    
    public function fetchAjaxRequest(VendorsDataTable $dataTable){
        return $dataTable->render('livewire.users.index');
    }
    
    public function show($id){
        $endPoint = "/users/".$id;
        $user = ApiRequestResponse::GetDataByEndPoint($endPoint);
        $user = json_decode($user, true);
        return response()->json($user);
    }
    
    
    public function update(Request $request){
        $reqParams = $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        
        try{
            $id = $request->input('id');
            $reqParams['user_id'] = Auth::user()->id;
            $endPoint = "/users/".$id;
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
            $endPoint = "/users/".$id;
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

    public function changeVendorAccountStatus(Request $request){
        $reqParams = $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);
        
        try{
            $id = $request->input('id');
            $status = $request->input('status');
            $is_active = $status == true ? 0 : 1;

            $reqParams['user_id'] = Auth::user()->id;
            $reqParams['status'] = $is_active;

            $endPoint = "/user/change-account/".$id;
            $resp = ApiRequestResponse::PostDataByEndPoint($endPoint, $reqParams);
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
