<?php

namespace App\Http\Livewire\Parking;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Livewire\WithFileUploads;
use App\Helpers\EndPoints;
use App\Models\Client;
use Auth;
use Helper;

class AddParkingArea extends Component
{
    use WithFileUploads;

    public $client_id, $name, $phone_number, $address, $description, $opens_at, $closes_at,
    $latitude, $longitude, $total_space, $photo;
    public function render()
    {
        $clients = Client::all();
        return view('livewire.parking.add-parking-area')
        ->with(compact('clients'));
        
    }
    
    public function resetInputFields(){
        $this->client_id = '';
        $this->name = '';
        $this->phone_number = '';
        $this->address = '';
        $this->description = '';
        $this->opens_at = '';
        $this->closes_at = '';
        $this->latitude = '';
        $this->longitude = '';
        $this->total_space = '';
        $this->photo = '';
    }
    
    public function store(){
        
        $reqParams = $this->validate([
            'client_id' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'description' => 'required',
            'opens_at' => 'required',
            'closes_at' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'total_space' => 'required',
            'photo' => 'required',
            
        ]);
        try{
       
                $user_id = Auth::user()->id;
                if($this->photo){
                    $this->validate([
                        'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $fileData['photo'] = $this->photo; 
                    $fileData['file_path'] = $this->photo->getPathname();
                    $fileData['fileRealPath'] = $this->photo->getRealPath();
                    $fileData['file_mime'] = $this->photo->getMimeType('image');
                    $fileData['file_name'] = $this->photo->getClientOriginalName();
                }
                
                $filename = isset($fileData['file_name']) ? $fileData['file_name'] : '';
                $filemime = isset($fileData['file_mime']) ? $fileData['file_mime'] : '';
                $fileRealPath = isset($fileData['fileRealPath']) ? $fileData['fileRealPath'] : '';
                $file_contents = !empty($fileRealPath) ? fopen($fileData['fileRealPath'], 'r') : '';
                
                $endPoint = '/parking-areas';
                $baseApiUrl = EndPoints::$BASE_URL;
                $url = $baseApiUrl . $endPoint;
                $request = ApiRequestResponse::httpObj()->request('POST',$url,[
                    'multipart' => [
                        ['name' => 'photo',
                        'filename' => $filename,
                        'Mime-Type' => $filemime,
                        'contents' => $file_contents ,
                    ],
                    ['name' => 'user_id', 'contents' => $user_id],
                    ['name' => 'client_id', 'contents' => $this->client_id],
                    ['name' => 'name', 'contents' => $this->name],
                    ['name' => 'phone_number', 'contents' => $this->phone_number],
                    ['name' => 'address', 'contents' => $this->address],
                    ['name' => 'description', 'contents' => $this->description],
                    ['name' => 'opens_at' , 'contents' => $this->opens_at],
                    ['name' => 'closes_at' , 'contents' => $this->closes_at],
                    ['name' => 'latitude', 'contents' => $this->latitude],
                    ['name' => 'longitude', 'contents' => $this->longitude],
                    ['name' => 'total_space', 'contents' => $this->total_space],
                ],
                
            ]);
            
            $resp = $request->getBody()->getContents();
            $apiResult = json_decode($resp, true);
            $statusCode = $apiResult['statusCode'];
            $message = $apiResult['message'];
            $data = $apiResult['data'];
            
            if($statusCode == '1'){
                session()->flash('success', $message);
                $this->resetInputFields();
            }else{
                session()->flash('error',   $message);
            }
        
        }catch(\Exception $ex){
            session()->flash('error',   $ex->getMessage());
        }
    }
    
    public function changeParkingAreaEvent($parking_area_id){
        $address = Client::where('id', $parking_area_id)->value('address');
        $this->address = $address;
    }
    
    
    
    
    
    
}
