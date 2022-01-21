<?php

namespace App\Http\Livewire\Goods;

use Livewire\Component;
use App\Helpers\ApiRequestResponse;
use App\Models\Goods;
use App\DataTables\GoodsDataTable;
use Illuminate\Http\Request;
use Auth;

class Index extends Component
{
    public function render()
    {
        return view('livewire.goods.index');
    }

    public function fetchAjaxRequest(GoodsDataTable $dataTable){
        return $dataTable->render('livewire.goods.index');
    }
}
