<?php

namespace App\Http\Livewire\Goods;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Livewire\WithFileUploads;
use App\Helpers\EndPoints;
use Illuminate\Support\Facades\Gate;
use Auth;
use Helper;
use App\Models\Vendor;

class Add extends Component
{

    use WithFileUploads;

    public $vendors, $vendor_id, $name, $qty_available, $unit_price, $photo;

    public function mount(){
        $response = Gate::inspect('isAdmin');
        if($response->allowed()){
            $this->vendors = Vendor::all();
        }else{
            $this->vendors = Vendor::where('id', Auth::user()->id)->get();
        }
       
    }

    public function render()
    {
        return view('livewire.goods.add');
    }

    public function resetInputFields(){
        $this->vendor_id = '';
        $this->name = '';
        $this->qty_available = '';
        $this->unit_price = '';
        $this->photo = '';
    }


 public function store(){

        $formData = $this->validate([
            'vendor_id' => 'required',
            'name' => 'required',
            'qty_available' => 'required',
            'unit_price' => 'required',
            'photo' => 'required',
        ]);

        $fileData = [];
        try{
            $user_id = Auth::user()->id;
            if($user_id){


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

                $endPoint = '/goods';
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
                ['name' => 'vendor_id', 'contents' => $this->vendor_id],
                ['name' => 'name', 'contents' => $this->name],
                ['name' => 'qty_available' , 'contents' => $this->qty_available],
                ['name' => 'unit_price', 'contents' => $this->unit_price]
                ],
                
            ]);

                $resp = $request->getBody()->getContents();
                $apiResult = json_decode($resp, true);
                $statusCode = $apiResult['statusCode'];
                $message = $apiResult['message'];
          
                if($statusCode == '1'){
                   session()->flash('success', $message);
                   $this->resetInputFields();
               }else{
                session()->flash('error',   $message);
            }
        }else{
            session()->flash('error',   "Login to add good");
        }

    }catch(\Exception $ex){
       session()->flash('error',   $ex->getMessage());
   }

}



}
