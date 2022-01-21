<?php

namespace App\Http\Livewire\ShoppingLists;

use Livewire\Component;
use App\DataTables\ShoppingListsDataTable;
use Illuminate\Http\Request;
use App\Helpers\ApiRequestResponse;
use Auth;

class Index extends Component
{
    public function render()
    {
        return view('livewire.shopping-lists.index');
    }

    public function fetchAjaxRequest(ShoppingListsDataTable $dataTable){
        return $dataTable->render('livewire.shopping-lists.index');
    }

    // 

    public function changeOrderStatus(Request $request){
        $reqParams = $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);
        
        try{
            $id = $request->input('id');
            $status = $request->input('status');
            $is_active = $status == 'PENDING' ? 1 : 0;

            $reqParams['user_id'] = Auth::user()->id;
            $reqParams['status'] = $is_active;

            $endPoint = "/shopping-orders/change-status/".$id;
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
