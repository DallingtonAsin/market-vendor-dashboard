<?php

namespace App\Http\Livewire\Password;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Auth;

class Edit extends Component
{
    public $current_password, $new_password, $confirm_password;

    public function render()
    {
        return view('livewire.password.edit');
    }

    public function resetInputFields(){
        $this->current_password = "";
        $this->new_password = "";
        $this->confirm_password = "";
    }

    public function update(){
        $reqParams = $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8'
        ]);

        $userId = Auth::user()->id;

        if($reqParams['new_password'] == $reqParams['confirm_password']){
            if($userId){
                $reqParams['user_id'] = $userId;
                $endPoint = '/user/password/edit';
                $resp = ApiRequestResponse::PostDataByEndPoint($endPoint, $reqParams);
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
          session()->flash('error', "Login to change your password");
      }
  }else{
      session()->flash('password_error', "Enter new matching passwords");
  }

}
}
