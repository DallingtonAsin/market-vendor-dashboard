<?php
/**
 * Created by Leontymo Developers.
 * User: timothy kasaga
 * Date: 5/16/2019
 * Time: 00:50
 */


namespace App\Helpers;


use app\ApiResp;
use GuzzleHttp\Client;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Response;
use Unirest\Request as UnirestRequest;
use Unirest\Request\Body;

class ApiHandler {

    public static function makePostRequest($endPoint, $data, $authenticates = false, $authToken = null, $baseApiUrl = null ){

        $resp = new ApiResp();

        try{

            /*
             * If we require authentication we set the token header
             * */
            if($authenticates){

                $headers = [
                    'X-Requested-With'=>'XMLHttpRequest',
                    'Authorization'=>'Bearer ' . $authToken,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'];

            }else{

                $headers =  [
                    'X-Requested-With'=>'XMLHttpRequest',
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'];

            }


            /*
             * Get the full URL
             * */
            $baseUrl = $baseApiUrl == null ? EndPoints::$BASE_URL : $baseApiUrl;
            $url = $baseUrl . $endPoint;


            /*
             * Build json request
             * */
            $body = Body::json($data);

            /*
             * Post the response to the API
             * */
            $response = UnirestRequest::post($url, $headers, $body);

            /*
             * UniRest handles the response for us, so we have the fields below
             * */
            $respStatusCode = $response->code;        // HTTP Status code
            $respHeaders = $response->headers;     // Headers
            $respBody = $response->body;        // Parsed body
            $respRawBody = $response->raw_body;    // Unparsed body


            /*
             * Http status code is not 200, so an Http error occurred
             * */
            if($respStatusCode != \Illuminate\Http\Response::HTTP_OK){

                $resp->statusCode = AppConstants::$STATUS_CODE_FAILED;
                $resp->statusDescription = $respStatusCode .' '. $respBody;
                return $resp;

            }


            /*
             * Http status code is 200, build the success response
             * */
            $resp->statusCode = AppConstants::$STATUS_CODE_SUCCESS;
            $resp->statusDescription = AppConstants::$STATUS_DESC_SUCCESS;
            $resp->result = json_encode($respBody);

            return $resp;


        }catch (\Exception $exception){

            /*
             * We supposed to log this exception returned
             * */

            $resp->statusCode = AppConstants::$STATUS_CODE_FAILED;
            $resp->statusDescription = AppConstants::$GENERAL_ERROR_AT_TDS.' '.$exception->getMessage();
            return $resp;

        }

    }

    public static function makeGetRequest($endPoint, $authenticates = false, $authToken = null, $identifier = null, $baseURL = null ){

        $resp = new ApiResp();

        try{

            /*
             * If we require authentication we set the token header
             * */
            if($authenticates){

                $headers = [
                    'Authorization'=>'Bearer ' . $authToken,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'];

            }else{

                $headers =  [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'];

            }


            /*
             * Get the full URL
             * */
            $baseURL = $baseURL == null ? EndPoints::$BASE_URL : EndPoints::$BASE_URL_USER_MANAGEMENT;
            $url = is_null($identifier) ?$baseURL . $endPoint : $baseURL . $endPoint . '/'.$identifier;

            /*
             * Post the response to the API
             * */
            $response = UnirestRequest::get($url, $headers);

            /*
             * UniRest handles the response for us, so we have the fields below
             * */
            $respStatusCode = $response->code;        // HTTP Status code
            $respHeaders = $response->headers;     // Headers
            $respBody = $response->body;        // Parsed body
            $respRawBody = $response->raw_body;    // Unparsed body


            /*
             * Http status code is not 200, so an Http error occurred
             * */
            if($respStatusCode != \Illuminate\Http\Response::HTTP_OK){

                $resp->statusCode = AppConstants::$STATUS_CODE_FAILED;
                $resp->statusDescription = $respStatusCode . json_encode($respBody);
                return $resp;

            }


            /*
             * Http status code is 200, build the success response
             * */
            $resp->statusCode = AppConstants::$STATUS_CODE_SUCCESS;
            $resp->statusDescription = AppConstants::$STATUS_DESC_SUCCESS;
            $resp->result = json_encode($respBody);

            return $resp;


        }catch (\Exception $exception){

            /*
             * We supposed to log this exception returned
             * */

            $resp->statusCode = AppConstants::$STATUS_CODE_FAILED;
            $resp->statusDescription = AppConstants::$GENERAL_ERROR_AT_TDS.' '.$exception->getMessage();
            return $resp;

        }

    }

    public static function makePutRequest($endPoint, $identifier, $data, $authenticates = false, $authToken = null, $baseApiUrl = null){

        $resp = new ApiResp();

        try{

            /*
             * If we require authentication we set the token header
             * */
            if($authenticates){

                $headers = [
                    'Authorization'=>'Bearer ' . $authToken,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'];

            }else{

                $headers =  [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'];

            }


            /*
             * Get the full URL e.g baseURL/endPoint/{Identifier}
             * */
            $baseUrl = $baseApiUrl == null ? EndPoints::$BASE_URL : $baseApiUrl;
            $url = $baseUrl . $endPoint . '/'.$identifier;


            /*
             * Build json request
             * */
            $body = Body::json($data);

            /*
             * Post the response to the API
             * */
            $response = UnirestRequest::put($url, $headers, $body);

            /*
             * UniRest handles the response for us, so we have the fields below
             * */
            $respStatusCode = $response->code;        // HTTP Status code
            $respHeaders = $response->headers;     // Headers
            $respBody = $response->body;        // Parsed body
            $respRawBody = $response->raw_body;    // Unparsed body


            /*
             * Http status code is not 200, so an Http error occurred
             * */
            if($respStatusCode != \Illuminate\Http\Response::HTTP_OK){

                $resp->statusCode = AppConstants::$STATUS_CODE_FAILED;
                $resp->statusDescription = "[".$respStatusCode."] ". json_encode($respBody);
                return $resp;

            }


            /*
             * Http status code is 200, build the success response
             * */
            $resp->statusCode = AppConstants::$STATUS_CODE_SUCCESS;
            $resp->statusDescription = AppConstants::$STATUS_DESC_SUCCESS;
            $resp->result = json_encode($respBody);

            return $resp;


        }catch (\Exception $exception){

            /*
             * We supposed to log this exception returned
             * */

            $resp->statusCode = AppConstants::$STATUS_CODE_FAILED;
            $resp->statusDescription = AppConstants::$GENERAL_ERROR_AT_TDS.' '.$exception->getMessage();
            return $resp;

        }

    }

    public static function makeDeleteRequest($endPoint, $identifier, $data, $authenticates = false, $authToken = null, $baseApiUrl = null){

        $resp = new ApiResp();

        try{

            /*
             * If we require authentication we set the token header
             * */
            if($authenticates){

                $headers = [
                    'Authorization'=>'Bearer ' . $authToken,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'];

            }else{

                $headers =  [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'];

            }


            /*
             * Get the full URL e.g baseURL/endPoint/{Identifier}
             * */
            $baseUrl = $baseApiUrl == null ? EndPoints::$BASE_URL : $baseApiUrl;
            $url = $baseUrl . $endPoint . '/'.$identifier;


            /*
             * Build json request
             * */
            $body = Body::json($data);

            /*
             * Post the response to the API
             * */
            $response = UnirestRequest::delete($url, $headers, $body);

            /*
             * UniRest handles the response for us, so we have the fields below
             * */
            $respStatusCode = $response->code;        // HTTP Status code
            $respHeaders = $response->headers;     // Headers
            $respBody = $response->body;        // Parsed body
            $respRawBody = $response->raw_body;    // Unparsed body


            /*
             * Http status code is not 200, so an Http error occurred
             * */
            if($respStatusCode != \Illuminate\Http\Response::HTTP_OK){

                $resp->statusCode = AppConstants::$STATUS_CODE_FAILED;
                $resp->statusDescription = $respBody;
                return $resp;

            }


            /*
             * Http status code is 200, build the success response
             * */
            $resp->statusCode = AppConstants::$STATUS_CODE_SUCCESS;
            $resp->statusDescription = AppConstants::$STATUS_DESC_SUCCESS;
            $resp->result = json_encode($respBody);

            return $resp;


        }catch (\Exception $exception){

            /*
             * We supposed to log this exception returned
             * */

            $resp->statusCode = AppConstants::$STATUS_CODE_FAILED;
            $resp->statusDescription = AppConstants::$GENERAL_ERROR_AT_TDS.' '.$exception->getMessage();
            return $resp;

        }

    }


}