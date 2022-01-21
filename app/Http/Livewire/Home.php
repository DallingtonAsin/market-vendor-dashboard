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
        $request_data = [];
        $income_data = [];

        return view('livewire.home')
               ->with(compact('data', 'request_data', 'income_data'));
    }

}
