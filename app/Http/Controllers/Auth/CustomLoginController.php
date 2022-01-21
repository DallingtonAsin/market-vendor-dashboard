<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Controller;
use App\Helpers\ApiRequestResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Helper;

class CustomLoginController extends Controller
{

	private $tbl;
	protected $dateTime;
	protected $session;

	use AuthenticatesUsers;

	public function __construct()
	{

		$this->tbl = 'users';
		$this->dateTime = now();
	}


	public function authenticate(Request $request){

		$reqParams = $this->validate($request,[
			'username' => 'required',
			'password' => 'required',
		]);
		try{

			$login = $reqParams['username'];
			$endPoint = '/vendor/login';
			$resp = ApiRequestResponse::PostDataByEndPoint($endPoint, $reqParams);
			$apiResult = json_decode($resp, true);
			$statusCode = $apiResult['statusCode'];
			$message = $apiResult['message'];
			if($statusCode == '1'){
			    $user = $apiResult['data'];
                $userId = $user['id'];
				Session::put('access_token', $user['access_token']);
                Auth::loginUsingId($userId, true);
				return redirect('/home');
			}else{
				return back()
				->with('loginErr', $message);
			}

		}catch(\Exception $ex){
			session()->flash('error',   $ex->getMessage());
		}
	}

	public function logout(Request $request){

		$action = "logged out of the system";
		if(!empty($request->name)){
			Helper::logger($request, $action, $this->dateTime);
		}
		Auth::logout();
		Session::forget('access_token');
		Session::flush();
		return redirect('/');

	}

	



}
