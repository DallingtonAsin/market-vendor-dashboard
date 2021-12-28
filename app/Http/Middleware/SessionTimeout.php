<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class SessionTimeout
{

      protected $session;
      protected $timeout = 1800; // 30 minutes

      public function __construct(Store $session)
      {
        $this->session = $session;
      }
      /**
       * Handle an incoming request.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \Closure  $next
       * @return mixed
       */
      public function handle($request, Closure $next)
      {
        $isLoggedIn = $request->path() != '/logout';
        $lastActivityTime = $this->session->get('lastActivityTime');
        (($this->timeout/60) > 1)
        ? $units = "minutes"
        : $units = "minute";

        if(! session('lastActivityTime'))
        {
          $this->session->put('lastActivityTime', time());
        }

        else if(time() - $lastActivityTime  > $this->timeout)
        {
          $this->session->forget('lastActivityTime');
          $cookie = cookie('intend', $isLoggedIn ? url()->current() : 'dashboard');
          $email = $request->user()->email;
          Session::forget('access_token');
          $msg = "session timed out after ".$this->timeout/60 ." ".$units." inactive";
          $dataArr = array("code" => '404',
            "message" => $msg,
            "method" => "Middleware@SessionTimeout@handle"
          );
          Auth::logout();
          if ($request->session()->exists('username')) {
            $request->session()->forget('username');
          }
          if ($request->session()->exists('password')) {
            $request->session()->forget('password');
          }  
          $message = "No activity within ".$this->timeout/60 ." ".$units."";
          return redirect('/')->with('sessionExpiredMessage',$message
            ,"warning", "try re-login");
        }


        $isLoggedIn 
        ? $this->session->put('lastActivityTime', time())
        : $this->session->forget('lastActivityTime');

        return $next($request);
      }


    }
