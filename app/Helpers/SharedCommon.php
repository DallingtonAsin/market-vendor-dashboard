<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\Role;
use App\Models\Client;
use App\Models\ParkingArea;
use App\Models\errorLog;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\VehicleCategory;
use App\Helpers\ApiRequestResponse;
use App\Helpers\ApiResponse;
use App\Helpers\EndPoints;
use Constant;


class SharedCommon
{

   public static function apiURL(){
    $url = EndPoints::$API_URL;
    return $url;
   }

   public static function GetProfilePic($filePath, $filename){
    return self::apiURL()."/".$filePath."/".$filename;
   }

    public static function logError($data)
    {
        try {
            $username = $data['username'];
            $error_code = $data['error_code'];
            $error_message = $data['error_message'];
            $error_severity = $data['error_severity'];
            $controller = $data['controller'];
            $method = $data['method'];

            $error = new errorLog();
            $error->username = $username;
            $error->error_code = $error_code;
            $error->error_message = $error_message;
            $error->error_severity = $error_severity;
            $error->controller = $controller;
            $error->method = $method;

            $resp = $error->save();
        } catch (\Exception $ex) {
        }
    }

    public static function logger(Request $request, $action, $date){

        $newLog = new ActivityLog();
        $newLog->name =$name =  $request->user()->name;
        $newLog->role = $userPosition = 1;
        $newLog->description = $action;
        $newLog->ip_address = \Request::getClientIp();
        $newLog->date = $date;

        $newLog->save();

    }


    public static function logActivity(Request $request, $action)
    {
        $log = new activityLog();
        $log->name =$name =  $request->user()->name;
        $log->role = 'role';
        $log->description = $action;
        $log->ip_address = \Request::getClientIp();
        $log->date = Carbon::now();
        $log->save();
    }

    public static function getMonthlyRequestReviewData(){
        $endPoint = '/reports/requests/data';
        $resp = ApiRequestResponse::GetDataByEndPoint($endPoint, []);
        $apiResult = json_decode($resp, true);
        $statusCode = $apiResult['statusCode'];
        $message = $apiResult['message'];
        $data = $apiResult['data'];
        return $data;
    }

    public static function getMonthlyIncomeReviewData(){
        $endPoint = '/reports/incomes/data';
        $resp = ApiRequestResponse::GetDataByEndPoint($endPoint, []);
        $apiResult = json_decode($resp, true);
        $statusCode = $apiResult['statusCode'];
        $message = $apiResult['message'];
        $data = $apiResult['data'];
        return $data;
    }

    public static function getRoleName($roleId){
      try{
        $role = Role::find($roleId);
        $name = $role->name;
        return $name;
    }catch(\Exception $ex){
        dd($ex->getMessage());
    }
}

public static function getParkingAreaName($areaId){
  try{
    $parking = ParkingArea::find($areaId);
    $name = $parking->name;
    return $name;
}catch(\Exception $ex){
    dd($ex->getMessage());
}
}

public static function getClientName($clientId){
  try{
    $client = Client::find($clientId);
    $name = $client->name;
    return $name;
}catch(\Exception $ex){
    dd($ex->getMessage());
}
}

public static function getRoles(){
 try{
    $endPoint = '/roles';
    $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
    $apiResult = json_decode($resp, true);

    $statusCode = $apiResult['statusCode'];
    $message = $apiResult['message'];
    $data = $apiResult['data'];
    $data = Role::hydrate($data);
    return $data;
}catch(\Exception $ex){
    session()->flash('error',   $ex->getMessage());
}

}

public static function getCompanyData(){
   $endPoint = '/company';
   $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
   $apiResult = json_decode($resp, true);
   $statusCode = $apiResult['statusCode'];
   $message = $apiResult['message'];
   $data = $apiResult['data'];
   $data = \App\Models\Company::hydrate($data);
    return $data;
}

   public static function getVehicleTypeName($id){
  
     try{
         $exists = VehicleCategory::where('id', '=', $id)->exists();
         if($exists){
             $name = VehicleCategory::where('id', '=', $id)->value('name');
             $resp['statusCode'] = Constant::$STATUS_CODE_SUCCESS;
             $resp['message'] = "Results found";
             $resp['data'] = $name;
         }else{
             $resp['statusCode'] = Constant::$STATUS_CODE_FAILED;
             $resp['message'] = "No vehicle type found";
         }

     }catch(Exception $ex){
         $resp['statusCode'] = Constant::$STATUS_CODE_ERROR;
         $resp['message'] = $ex->getMessage();
     }
     return $resp;
}









}
