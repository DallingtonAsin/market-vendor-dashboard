<?php


namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use App\Helpers\EndPoints;
use Auth;

class ApiRequestResponse
{

	public static function getHttpHeaders(){
	
		if(Session::has('access_token')){
           $bearerToken = Session::get('access_token');
		}else{
			$bearerToken = null;
		}
		// dd($bearerToken);
		$headers    =   [
			'headers' => [
				'Content-Type' => 'application/json',
			    'Authorization' => 'Bearer ' . $bearerToken,
			]
		];
		return $headers;
	}

	public static function httpObj(){
		$client = new \GuzzleHttp\Client(self::getHttpHeaders());
		return $client;
	}


// API GET METHODS
	public static function GetDataByUrl($url)
	{
		$request = self::httpObj()->get($url, ['verify' => false]);
		$response = $request->getBody()->getContents();
		return $response;
	}



	public static function GetDataByEndPoint($endPoint)
	{
		$baseApiUrl = EndPoints::$BASE_URL;
		$url = $baseApiUrl . $endPoint;

		$request = self::httpObj()->get($url, ['verify' => false]);
		$response = $request->getBody()->getContents();
		return $response;
	}

	public static function GetDataByPostEndPoint($endPoint, $body)
	{
		$baseApiUrl = EndPoints::$BASE_URL;
		$url = $baseApiUrl . $endPoint;
		$request = self::httpObj()->request('POST',$url, ['form_params' => $body]);
		$response = $request->getBody()->getContents();
		return $response;
	}


// API POST METHODS
	public static function PostDataByEndUrl($url, $body)
	{
		$request = self::httpObj()->request('POST',$url, ['form_params' => $body]);
		$response = $request->getBody()->getContents();
		return $response;
	}

	public static function PostDataWithFileByEndUrl($url, $fileData, $formData)
	{
		$filename = isset($fileData['file_name']) ? $fileData['file_name'] : '';
		$filemime = isset($fileData['file_mime']) ? $fileData['file_mime'] : '';
		$fileRealPath = isset($fileData['fileRealPath']) ? $fileData['fileRealPath'] : '';
		$contents = !empty($fileRealPath) ? fopen($fileData['fileRealPath'], 'r') : '';

		$request = self::httpObj()->request('POST',$url,[
			'multipart' => [
				['name' => 'photo',
				'filename' => $filename,
				'Mime-Type' => $filemime,
				'contents' => $contents,
			], 
			['name' => 'form-data',
			'contents' => json_encode($formData),
		]
	]
]);
		$response = $request->getBody()->getContents();
		return $response;
	}

	public static function returnArrayItems($arr){
		$x;
		foreach($arr as $i){
			$x[] = $i;
		}
		return $x;
	}


	public static function PostDataWithFileByEndPoint($endPoint, $formData,
		$fileData)
	{
		$baseApiUrl = EndPoints::$BASE_URL;
		$url = $baseApiUrl . $endPoint;

		$filename = isset($fileData['file_name']) ? $fileData['file_name'] : '';
		$filemime = isset($fileData['file_mime']) ? $fileData['file_mime'] : '';
		$fileRealPath = isset($fileData['fileRealPath']) ? $fileData['fileRealPath'] : '';
		$contents = !empty($fileRealPath) ? fopen($fileData['fileRealPath'], 'r') : '';


		$request = self::httpObj()->request('POST',$url,[
			'multipart' => [
				['name' => 'photo',
				'filename' => $filename,
				'Mime-Type' => $filemime,
				'contents' => $contents ,
			  ], 
              self::returnArrayItems($formData)
			],
              
]);
		$response = $request->getBody()->getContents();
		return $response;
	}

	public static function PostDataByEndPoint($endPoint, $body)
	{
		$baseApiUrl = EndPoints::$BASE_URL;
		$url = $baseApiUrl . $endPoint;
		$request = self::httpObj()->request('POST',$url, ['form_params' => $body]);
		$response = $request->getBody()->getContents();
		return $response;
	}


// API PUT METHODS
	public static function PutDataByEndPoint($endPoint, $body)
	{
		$baseApiUrl = EndPoints::$BASE_URL;
		$url = $baseApiUrl . $endPoint;
		$request = self::httpObj()->request('PUT',$url, ['form_params' => $body]);
		$response = $request->getBody()->getContents();
		return $response;
	}


// API DELETE METHODS
	public static function deleteDataByUrl($url){
		$request = self::httpObj()->delete($url);
		$response = $request->getBody()->getContents();
		return $response;
	}

	public static function deleteDataByEndPoint($endPoint, $body){
		$baseApiUrl = EndPoints::$BASE_URL;
		$url = $baseApiUrl . $endPoint;
		$request = self::httpObj()->delete($url, ['form_params' => $body]);
		$response = $request->getBody()->getContents();
		return $response;

	}







}