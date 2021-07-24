<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ApiRequestResponse;
use Livewire\WithFileUploads;
use Helper;

class Edit extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $username, $email, $user_id,
    $gender, $mobile_no, $user_role, $address, $nin, $photo;

    public $genderOptions;

    public function mount(){
        $this->setUser();
        $this->genderOptions = ['Male', 'Female'];
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
        $this->gender = Auth::user()->gender;
        $this->mobile_no = Auth::user()->mobile_no;
        $this->user_role = ucfirst(Helper::getRoleName(Auth::user()->role));
        $this->address = Auth::user()->address;
        $this->nin = Auth::user()->national_id_no;

    }

    public function update(Request $request){

        $reqParams = $this->validate([
         'first_name' => 'required|min:3',
         'last_name' => 'required|min:3',
         'username' => 'required',
         'email' => 'required|email',
         'gender' => 'required',
         'mobile_no' => 'required',
         'address' => 'required',
         'nin' => 'required',
     ]);

        $fileData = [];

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


         $reqParams['user_role'] = Auth::user()->role;
         $reqParams['user_id'] = Auth::user()->role;
         $reqParams['id'] = Auth::user()->id; 

    
        try{

            

            // dd($reqParams);

            $endPoint = '/users';
            $resp = ApiRequestResponse::PostDataWithFileByEndPoint($endPoint, $reqParams, $fileData);
            $apiResult = json_decode($resp, true);
            $statusCode = $apiResult['statusCode'];
            $message = $apiResult['message'];
            $data = $apiResult['data'];
           

            if($statusCode == '1'){
               session()->flash('success', $message);
           }else{
            session()->flash('error',   $message);
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
    $gender = $this->getGender(Auth::user()->id);
    $action = "updated ".$gender." profile";
    LogsController::logger($request, $action, now());
    $actionx = Str::replaceFirst($gender, 'your', $action);
    $sessionVariable = 'success';
    $message = $this->ActionMessage($actionx);
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
