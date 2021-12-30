<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\DataTables\UsersDataTable;
class Index extends Component
{
    public $model = User::class;
    
    public $user_id, $first_name, $last_name,$genderOptions,
    $phone_number, $gender, $email, $address;
    
    public function mount(){
        $this->genderOptions = ['Male', 'Female'];
    }
    
    public function render()
    {
        return view('livewire.users.index');
    }
    
    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->phone_number = '';
        $this->gender = '';
        $this->email = '';
        $this->address = '';
    }
    
    public function fetchAjaxRequest(UsersDataTable $dataTable){
        return $dataTable->render('livewire.users.index');
    }
    
    
}
