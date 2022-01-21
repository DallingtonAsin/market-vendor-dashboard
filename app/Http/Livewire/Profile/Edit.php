<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ApiRequestResponse;
use Livewire\WithFileUploads;
use App\Helpers\EndPoints;
use Helper;

class Edit extends Component
{
    use WithFileUploads;
    
    public $first_name, $last_name, $username, $email, $user_id,
    $mobile_no, $user_role, $address, $photo;
    
    public function mount(){
        $this->setUser();
    }
    
    public function render()
    {
        return view('livewire.profile.edit');
        
    }
    
    public function setUser(){
        $this->first_name = Auth::user()->first_name;
        $this->last_name = Auth::user()->last_name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->mobile_no = Auth::user()->phone_number;
        $this->user_role = ucfirst(Helper::getRoleName(Auth::user()->role));
        $this->address = Auth::user()->address;
        
    }
    
    public function update(){
        $formData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
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
                    ['name' => 'username', 'contents' => $this->username],
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



public function updatee(Request $request, $id)
{
    
    $user = User::find($id);
    $old_username = $user->username;
    $user->username = $new_username = $request->input('Username');
    $user->email = $request->input('Email');
    $user->tel_no = $request->input('Contact');
    $user->address = $request->input('Address');
    $OldPassword = $request->input('OldPassword');
    $NewPassword = $request->input('NewPassword');
    $ConfirmPassword = $request->input('PasswordConfirm');
    
    if($request->hasfile('image')){
        
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move("uploads/images/".$this->getRole(Auth::user()->user_role)."",$filename);
        $user->image = $filename;
    }
    $arr =  $this->getUsernamesArr();
    if(in_array($old_username, $arr))
    {
        for($i=0; $i<count($arr); $i++){
            if($arr[$i] == $old_username){
                $index = $i;
                break;
            }
            else{
                $index = -1;
            }
        }
        
        $newArr = Arr::except($arr, $index);
        
    }
    else {
        $newArr = $arr;
    }
    
    $bool = $this->is_inArr($newArr, $new_username);
    
    if($bool === true){
        $sessionVariable = 'error';
        $message = "this username ".$new_username." is already taken up, please enter a different one!";
    }
    else if($bool === false) {
        
        if($request->filled('OldPassword') && $request->filled('NewPassword') && isset($ConfirmPassword) ){
            //   dd("Whatsap");
            if(Hash::check($OldPassword, Auth::user()->password)){
                if($NewPassword == $ConfirmPassword){
                    $user->password = Hash::make($ConfirmPassword);
                }
                else{
                    $sessionVariable = 'error';
                    $message = "Your new passwords don't match, please enter matching passwords";
                    return response()->json([$sessionVariable => $message]);
                }
            }
            else
            {
                $sessionVariable = 'error';
                $message = "You have entered old password that doesn't match the current stored password, please try again!";
                return response()->json([$sessionVariable => $message]);
            }
        }
        else
        {
            $user->password = Auth::user()->password;
        }
        
        $result = $user->save();
        if($result) {
         
            $action = "updated profile";
            LogsController::logger($request, $action, now());
            $sessionVariable = 'success';
            $message = $this->ActionMessage($action);
        }
        else
        {
            $sessionVariable = 'error';
            $message = 'Profile update failed';
        }
        
    }
    
    return response()
    ->json([$sessionVariable => $message]);
    
}









}
