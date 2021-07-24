<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Helpers\ApiRequestResponse;
use Helper;
use Auth;

class Company extends Component
{
    public $name, $abbreviation, $email, $address,
           $mobile_no, $motto, $company_id;

    public function mount(){
           $this->setCompany(); 
    }

    public function render()
    {
        return view('livewire.settings.company');
    }

    public function setCompany(){

                $data = Helper::getCompanyData();
                if(count($data) > 0){
                $company = $data[0];
                $this->company_id = $company->id;
                $this->name = $company->name;
                $this->abbreviation = $company->abbreviation;
                $this->email = $company->email;
                $this->address = $company->address;
                $this->mobile_no = $company->mobile_no;
                $this->motto = $company->motto;
                }
    }

    public function store(Request $request){
        $reqParams = $this->validate([
           'name' => 'required',
           'email' => 'required',
           'address' => 'required',
           'mobile_no' => 'required',
        ]);

         try{
          
            $user_id = Auth::user()->id;
            if($user_id){

                $reqParams['user_id'] = $user_id;
                $endPoint = '/company';
                $reqParams['abbreviation'] = $this->abbreviation;
                $reqParams['motto'] = $this->motto;
                if($this->company_id){
                   $reqParams['company_id'] = $this->company_id;
                }
                $resp = ApiRequestResponse::PostDataByEndPoint($endPoint, $reqParams);
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
            session()->flash('error',   "Login to process this request");
        }

    }catch(\Exception $ex){
       session()->flash('error',   $ex->getMessage());
   }

    }




}
