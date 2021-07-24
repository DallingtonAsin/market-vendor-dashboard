<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Helper;

class Home extends Component
{
    public function render()
    {
        $endPoint = '/reports';
        $resp = ApiRequestResponse::GetDataByEndPoint($endPoint, []);
        $apiResult = json_decode($resp, true);
        $statusCode = $apiResult['statusCode'];
        $message = $apiResult['message'];
        $data = $apiResult['data'];

        $arr = $this->getMonthlyData();
        $request_data = $arr[0];
        $income_data = $arr[1];

        return view('livewire.home')
               ->with(compact('data', 'request_data', 'income_data'));
    }

     public function getMonthlyData(){
            $request_data = Helper::getMonthlyRequestReviewData();
            $income_data = Helper::getMonthlyIncomeReviewData();
            return [$request_data, $income_data];
     }
}
