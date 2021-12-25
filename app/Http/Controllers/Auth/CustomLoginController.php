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
		$this->middleware('guest')->except('logout');
	}


	public function authenticate(Request $request){

		$reqParams = $this->validate($request,[
			'username' => 'required',
			'password' => 'required',
		]);
		try{

			$login = $reqParams['username'];
			$endPoint = '/user/login';
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
				$this->flushSessionData($request);
				return back()
				->with('loginErr', $message);
			}

		}catch(\Exception $ex){
			session()->flash('error',   $ex->getMessage());
		}
	}

	



	public function authenticat(Request $request)
	{

		($request->has('remember'))
		? $remembered = true
		: $remembered = false;

		$this->validate($request,[
			'username' => 'required',
			'password' => 'required',
		]);

		$login = $request->input('username');
		$password = $request->input('password');

		filter_var($login, FILTER_VALIDATE_EMAIL)
		? $fieldType = 'email' 
		: $fieldType = 'username';

		$user_id = $this->getUserId($login, $password);

		if(Auth::attempt([$fieldType => $login,
			'password' =>  $password
		], $remembered)){

			$userId = $this->getUserId($login);
			$status = $this->findAccountStatus($userId);
			if($status == 0){

				$this->flushSessionData($request);
				
				return back()
				->with('loginErr', 'Your account is inactivated, see admin');
			}
			if($status == 1){
				$action = "logged into the system";
				Helper::logger($request, $action, $this->dateTime);
				return redirect('/home');

			}
		}
		else
		{
			$this->flushSessionData($request);
			return back()
			->with('loginErr', 'Invalid login credentials');

		}


	}


	public function logout(Request $request){

		$action = "logged out of the system";
		if(!empty($request->name)){
			Helper::logger($request, $action, $this->dateTime);
		}
		Auth::logout();
		$this->flushSessionData($request);
		
		return redirect('/');

	}

	//Flush login data and all session variables on login attempts
	protected function flushSessionData(Request $request)
	{
		
		Session::flush();
		

	}

	public function getUserId($login)
	{
		filter_var($login, FILTER_VALIDATE_EMAIL)
		? $fieldType = 'email' 
		: $fieldType = 'username';

		$userId = DB::table($this->tbl)
		->where($fieldType, $login)
		->value('email');

		return $userId;
	}

	public function findAccountStatus($id){

		$accountStatus = DB::table($this->tbl)
		->where('email', $id)->value('is_active');
		return $accountStatus;

	}


	public function findUsername(){

		$login = request()->input('pos_login');

		$fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		request()->merge([$fieldType => $login]);
		if($fieldType){
			return $fieldType;  
		}

	}


}
