<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Helper;

class Index extends Component
{
    public $first_name, $last_name, $username, $email,
           $user_id, $gender, $mobile_no, $user_role,
           $address, $nin, $created_at, $updated_at;

    public function mount(){
        $this->setUser();
    }

    public function render()
    {
        return view('livewire.profile.index');

    }

    public function setUser(){
        $this->first_name = Auth::user()->first_name;
        $this->last_name = Auth::user()->last_name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->gender = Auth::user()->gender;
        $this->mobile_no = Auth::user()->mobile_no;
        $this->user_role = Helper::getRoleName(Auth::user()->role);
        $this->address = Auth::user()->address;
        $this->nin = Auth::user()->national_id_no;
        $this->created_at = Auth::user()->created_at;
        $this->updated_at = Auth::user()->updated_at;
    }

    public function update(){

        $reqParams = $this->validate([
           'first_name' => 'required|min:6',
           'last_name' => 'required|min:6',
           'email' => 'required|email',
           'gender' => 'required',
           'mobile_no' => 'required',
           'user_role' => 'required',
           'address' => 'required',
           'nin' => 'required',
       ]);

        dd($reqParams);

        try{

            $endPoint = '/users';
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

    }catch(\Exception $ex){
     session()->flash('error',   $ex->getMessage());
 }

}


}
