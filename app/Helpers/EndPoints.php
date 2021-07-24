<?php

namespace App\Helpers;

class EndPoints {

    public static $API_URL, $BASE_URL; 
    static function init(){
        self::$API_URL = config('app.apiURL');
        self::$BASE_URL = config('app.apiBaseURL');
    }

}

EndPoints::init();
