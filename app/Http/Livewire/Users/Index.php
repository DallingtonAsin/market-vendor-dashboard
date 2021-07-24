<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\DataTables\UsersDataTable;
class Index extends Component
{
    public $model = User::class;
    public function render()
    {
        return view('livewire.users.index');
    }

    public function fetchAjaxRequest(UsersDataTable $dataTable){
                try {
                        return $dataTable->render('livewire.users.index');
                    } catch (\Exception $ex) {
                        dd($ex->getMessage());
                    }
       }

       
}
