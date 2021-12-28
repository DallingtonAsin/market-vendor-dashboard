<?php

namespace App\Helpers;

class EndPoints {

    public static $API_URL, $BASE_URL; 
    static function init(){
        self::$API_URL = config('app.APP_API');
        self::$BASE_URL = config('app.API_BASE_URL');
    }

}

EndPoints::init();
