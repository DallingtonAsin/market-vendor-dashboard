<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\Client;
use Livewire\Livewire;
use Helper;


class ClientsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

         return datatables($query)
        ->addIndexColumn()
        ->addColumn('action', function ($client) {
            
            // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
            // data-id="'.$client->id.'" data-original-title="Edit" wire:click="edit({{ $client->id }})" 
            // class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

            //  <a href="javascript:void(0)" data-toggle="tooltip"
            // data-id="'.$client->id.'" data-original-title="View" id="view-client"
            // class="btn btn-warning btn-sm ml-2"><i class="fa fa-trash"></i> <a href="javascript:void(0)" data-toggle="tooltip"
            // data-id="'.$client->id.'" data-original-title="Delete" wire:click="delete({{ $client->id }})" 
            // class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a>';

            $btn = Livewire::mount('actions.clients.index', ['client' => $client])->html();

           return $btn;

        })->addColumn('checkbox', function ($client) {
              $checkBox = '<input type="checkbox" id="'.$client->id.'"/>';
             return $checkBox;
        })->rawColumns(['action', 'checkbox']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Client $model)
    {
        
            $endPoint = '/clients';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            // dd($data);
            $data = Client::hydrate($data);
            return $data; 
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('clientsDatatable')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',
            'mobile_number',
            'email'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Clients_' . date('YmdHis');
    }
}



