<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use App\Models\Role;
use App\DataTables\RolesDataTable;
use Illuminate\Http\Request;
use Auth;

class Index extends Component
{
    public $count = 0;
    public $name, $role_id;
    public function render()
    {
        return view('livewire.roles.index');
    }

    public function fetchAjaxRequest(RolesDataTable $dataTable){
        return $dataTable->render('livewire.roles.index');
    }


    public function show($id){
        $endPoint = "/roles/".$id;
        $user = ApiRequestResponse::GetDataByEndPoint($endPoint);
        $user = json_decode($user, true);
        return response()->json($user);
    }
    
    
    public function update(Request $request){
        $reqParams = $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);
        
        try{
            $reqParams['user_id'] = Auth::user()->id;
            $id = $request->input('id');
            $endPoint = "/roles/".$id;
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
            $reqParams['user_id'] = Auth::user()->id;
            $id = $request->input('id');
            $endPoint = "/roles/".$id;
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
