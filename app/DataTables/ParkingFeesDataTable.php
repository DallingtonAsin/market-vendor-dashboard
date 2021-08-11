<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ParkingFee;
use App\Models\VehicleCategory;
use App\Models\ParkingArea;
use App\Models\Client;
use Helper;


class ParkingFeesDataTable extends DataTable
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
        ->addColumn('action', function ($parkingFee) {
            
            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$parkingFee->id.'" data-original-title="Edit" wire:click="edit({{ $parkingFee->id }})" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

             <a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$parkingFee->id.'" data-original-title="View" id="view-parkingFee"
            class="btn btn-warning btn-sm ml-2"><i class="fa fa-trash"></i> <a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$parkingFee->id.'" data-original-title="Delete" wire:click="delete({{ $parkingFee->id }})" 
            class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a>';

           return $btn;

        })->editColumn('fee', function ($parkingFee) {
             return number_format($parkingFee->fee);
        })->addColumn('checkbox', function ($parkingFee) {
              $checkBox = '<input type="checkbox" id="'.$parkingFee->id.'"/>';
             return $checkBox;
        })->addColumn('client', function ($parkingFee) {
             $clientName = Client::where('id', $parkingFee->client_id)->value('name');
             return $clientName;
        })->addColumn('parking_area', function ($parkingFee) {
             $parking_area = ParkingArea::where('id', $parkingFee->parking_area_id)->value('name');
             return $parking_area;
        })->addColumn('vehicle_category', function ($parkingFee) {
            $obj = VehicleCategory::find($parkingFee->vehicle_cat_id);
             return $obj->name;
        })->rawColumns(['action', 'checkbox']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ParkingFee $model)
    {
        
            $endPoint = '/parking_fees';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            // dd($data);
            $data = ParkingFee::hydrate($data);
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
                    ->setTableId('parkingFeesDatatable')
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
            'vehicle_cat_id',
            'fee'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ParkingFees_' . date('YmdHis');
    }
}



