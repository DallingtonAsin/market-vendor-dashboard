<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\VehicleCategory;
use Helper;


class VehicleCategoryDataTable extends DataTable
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
        ->addColumn('action', function ($vehicleCat) {
            
            $btn = '<div class="row"><a href="javascript:void(0)" data-toggle="modal" data-target="#editVehicleType"
            data-id="'.$vehicleCat->id.'" data-original-title="Edit" wire:click="edit({{ $vehicleCat->id }})" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
          <a href="javascript:void(0)" data-toggle="modal" data-target="#deleteVehicleType"
            data-id="'.$vehicleCat->id.'" data-original-title="Delete" wire:click="delete({{ $vehicleCat->id }})" 
            class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></div>';

           return $btn;

        })->addColumn('checkbox', function ($vehicleCat) {
              $checkBox = '<input type="checkbox" id="'.$vehicleCat->id.'"/>';
             return $checkBox;
        })->rawColumns(['action', 'checkbox']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(VehicleCategory $model)
    {
        
            $endPoint = '/vehicle-category';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            // dd($data);
            $data = VehicleCategory::hydrate($data);
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
                    ->setTableId('vehicleCatsDatatable')
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
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}



