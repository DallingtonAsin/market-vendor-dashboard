<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Livewire\WithFileUploads;
use App\Helpers\EndPoints;
use Auth;
use Helper;

class Add extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $email, $user_id, $photo, $mobile_no, $user_role, $address;
    public $updateMode = false;

 

    public function render()
    {
        $roles = Helper::getRoles();
        return view('livewire.vendors.add')->with(compact('roles'));
    }

    public function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->mobile_no = '';
        $this->user_role = '';
        $this->address = '';
        $this->photo = '';
    }

    public function store(){

        $formData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required',
            'user_role' => 'required',
            'address' => 'required',
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

                $endPoint = '/users';
                $baseApiUrl = EndPoints::$BASE_URL;
                $url = $baseApiUrl . $endPoint;
                // dd($formData);


                $request = ApiRequestResponse::httpObj()->request('POST',$url,[
                    'multipart' => [
                        ['name' => 'photo',
                        'filename' => $filename,
                        'Mime-Type' => $filemime,
                        'contents' => $file_contents ,
                    ],
                ['name' => 'user_id', 'contents' => $user_id],
                ['name' => 'first_name', 'contents' => $this->first_name],
                ['name' => 'last_name', 'contents' => $this->last_name],
                ['name' => 'email' , 'contents' => $this->email],
                ['name' => 'mobile_no', 'contents' => $this->mobile_no],
                ['name' => 'user_role', 'contents' => $this->user_role],
                ['name' => 'address', 'contents' => $this->address],
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
        }else{
            session()->flash('error',   "Login to register user");
        }

    }catch(\Exception $ex){
       session()->flash('error',   $ex->getMessage());
   }

}

public function edit($id){
    $this->updateMode = true;
    $user = User::where('id', $id)->first();
    $this->first_name = $user->first_name;
    $this->last_name = $user->last_name;
    $this->email = $user->email;
    $this->mobile_no = $user->mobile_no;
    $this->user_role = $user->user_role;
    $this->address = $user->address;
}

public function cancel(){
    $this->updateMode = false;
    $this->resetInputFields();
}

public function update(){
  $formData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'mobile_no' => 'required',
            'user_role' => 'required',
            'address' => 'required',
            'nin' => 'required',
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

                $endPoint = '/users';
                $baseApiUrl = EndPoints::$BASE_URL;
                $url = $baseApiUrl . $endPoint;
                // dd($formData);


                $request = ApiRequestResponse::httpObj()->request('POST',$url,[
                    'multipart' => [
                        ['name' => 'photo',
                        'filename' => $filename,
                        'Mime-Type' => $filemime,
                        'contents' => $file_contents ,
                    ],
                ['name' => 'user_id', 'contents' => $user_id],
                ['name' => 'id', 'contents' => $user_id],
                ['name' => 'first_name', 'contents' => $this->first_name],
                ['name' => 'last_name', 'contents' => $this->last_name],
                ['name' => 'email' , 'contents' => $this->email],
                ['name' => 'gender' , 'contents' => $this->gender],
                ['name' => 'mobile_no', 'contents' => $this->mobile_no],
                ['name' => 'user_role', 'contents' => $this->user_role],
                ['name' => 'address', 'contents' => $this->address],
                ['name' => 'nin', 'contents' =>$this->address], 
                ],
                
            ]);

                $resp = $request->getBody()->getContents();
                $apiResult = json_decode($resp, true);
                $statusCode = $apiResult['statusCode'];
                $message = $apiResult['message'];
                $data = $apiResult['data'];

                if($statusCode == '1'){
                   session()->flash('success', $message);
               }else{
                session()->flash('error',   $message);
            }
        }else{
            session()->flash('error',   "Login to update profile");
        }

    }catch(\Exception $ex){
       session()->flash('error',   $ex->getMessage());
   }

}


public function delete($id){

 try{

    $user_id = Auth::user()->id;
    if($user_id){

        if($id){
            $reqParams = array(
                'id' => $id,
            'user' => 'Anonymous', // $request->user()->name,
        );
            $endPoint = '/users/'.$id.'';
            $resp = ApiRequestResponse::deleteDataByEndPoint($endPoint, $reqParams);
            $apiResult = json_decode($resp, true);

            $statusCode = $apiResult['statusCode'];
            $message = $apiResult['message'];
            $data = $apiResult['data'];

            if($statusCode == '1'){
               session()->flash('success', $message);
           }else{
            session()->flash('error',   $message);
        }

    }else{

        session()->flash('error',   "Couldn't find user id");
    }

}else{
    session()->flash('error',   "Login to delete user");
}


}catch(\Exception $ex){
    session()->flash('error',   $ex->getMessage());
}

}











}