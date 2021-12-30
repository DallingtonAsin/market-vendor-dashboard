<?php

namespace App\Http\Livewire\Requests;

use Livewire\Component;
use App\DataTables\Requests\PendingRequestsDataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ParkingRequest;

class Pending extends Component
{
    public function render()
    {
           // $endPoint = '/requests';
           //  $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
           //  $apiResult = json_decode($resp, true);
           //  $data = $apiResult['data'];
           //  dd($data);
            // $data = json_encode($data);
            // $data = ParkingRequest::hydrate($data);
            // return $data; 
        return view('livewire.requests.pending');
    }

     public function fetchAjaxRequest(PendingRequestsDataTable $dataTable){
                try {
                        return $dataTable->render('livewire.requests.pending');
                    } catch (\Exception $ex) {
                        dd($ex->getMessage());
                    }
       }


       public function approveSelected(Request $request){
        try {
            $ids =  $request->input('selected_rows');

            dd($ids);
            $deletedStock = array();

            if (count($ids) > 0) {
                foreach ($ids as $id) {
                    $findId = Stock::find($id);
                    $findId->delete();
                    array_push($deletedStock, $findId->item);
                }
            }
            $sessionVariable = 'success';
            $deletedStockStr = implode(", ", $deletedStock);
            $action = "removed stock ".$deletedStockStr." from the system";
            if (count($ids) == 1) {
                $action = Str::replaceFirst('stock', 'stock item', $action);
            }
            $response = $this->SuccessMessage($action);

            $dataArr = array("code" => '200',
                "message" => $action,
                "method" => "".$this->controller."@RemoveSelected"
            );
            LogsController::logger($request, $action, now());
            LogAfterRequest::LogRequest($request, $dataArr);

            $arr = $this->GetSumupDetails();

            return response()
              ->json([$sessionVariable => $response,
                      'totl_stock' => $arr['totl'],
                      'stock_value' => $arr['value'],
              ]);

           
        } catch (\Exception $ex) {
            $data = array(
          'username' => auth()->user()->username,
          'error_code' => $ex->getCode(),
          'error_message' => $ex->getMessage(),
          'error_severity' => Constant::$STATUS_ERROR_SEVERITY,
          'controller' => $this->controller,
          'method' => 'RemoveSelected'
        );
            Helper::logError($data);
            abort(409, $ex->getMessage());
        }
    }


}
