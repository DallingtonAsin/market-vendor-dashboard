<?php

namespace App\Http\Livewire\Users\Roles;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use App\Models\Role;
use Auth;

class Index extends Component
{
    public $count = 0;
    public $name, $role_id;
    public function render()
    {

        $endPoint = '/roles';
        $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
        $apiResult = json_decode($resp, true);

        $statusCode = $apiResult['statusCode'];
        $message = $apiResult['message'];
        $roles = $apiResult['data'];
        $roles = Role::hydrate($roles);
      
        return view('livewire.users.roles.index')->with(compact('roles'));
    }

    public function edit($id){
        $role = Role::find($id);
        $this->role_id = $id;
        $this->name = $role->name;
    }

    public function comfirmDelModal($id){
    $this->role_id = $id;
    $this->name = Role::find($id)->name;
     }

      public function update(){

        $reqParams = $this->validate([
            'role_id' => 'required',
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
                   $this->dispatchBrowserEvent('closeModal');
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

    public function delete($id){
        $reqParams = $this->validate([
            'role_id' => 'required',
        ]);
          try{

            $user_id = Auth::user()->id;
            if($user_id){
                $reqParams['user_id'] = $user_id;
                $endPoint = '/roles/destroy';
                $resp = ApiRequestResponse::PostDataByEndPoint($endPoint, $reqParams);
                $apiResult = json_decode($resp, true);
                $statusCode = $apiResult['statusCode'];
                $message = $apiResult['message'];
                $data = $apiResult['data'];

                if($statusCode == '1'){
                   session()->flash('success', $message);
                   $this->dispatchBrowserEvent('closeModal');
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
