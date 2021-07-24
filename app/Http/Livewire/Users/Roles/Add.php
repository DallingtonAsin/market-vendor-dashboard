<?php

namespace App\Http\Livewire\Users\Roles;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use Auth;

class Add extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.users.roles.add');
    }

    public function resetInputFields(){
        $this->name = '';
    }

    public function store(){
        $reqParams = $this->validate([
          'name' => 'required',
      ]);

        try{

            $user_id = Auth::user()->id;
            if($user_id){
                $reqParams['user_id'] = $user_id;
                $endPoint = '/roles';
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
            session()->flash('error',   "Login to add role");
        }

    }catch(\Exception $ex){
       session()->flash('error',   $ex->getMessage());
   }


}
}
