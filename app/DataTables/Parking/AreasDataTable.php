<?php

namespace App\DataTables\Parking;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ParkingArea;
use App\Models\Client;
use Helper;


class AreasDataTable extends DataTable
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
        ->addColumn('action', function ($parkingArea) {

            $btn = '<div class="row"><a href="javascript:void(0)" data-toggle="tooltip" 
            data-id="'.$parkingArea->id.'" data-name="'.$parkingArea->name.'" id="edit-parking-area" data-original-title="Edit" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

          <a href="javascript:void(0)" data-toggle="tooltip" 
            data-id="'.$parkingArea->id.'" data-name="'.$parkingArea->name.'" id="delete-parking-area"  data-original-title="Delete" 
            class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></div>';

           return $btn;

        })->addColumn('checkbox', function ($parkingArea) {
              $checkBox = '<input type="checkbox" id="'.$parkingArea->id.'"/>';
             return $checkBox;
        })->addColumn('client', function ($parkingArea) {
            $obj = Client::find($parkingArea->client_id);
             return $obj->name;
        })->rawColumns(['action', 'checkbox']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ParkingArea $model)
    {
        
            $endPoint = '/parking-areas';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
        
            // dd($data);
            $data = ParkingArea::hydrate($data);
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
                    ->setTableId('parkingAreasDatatable')
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
            'client_id',
            'areas'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'parkingAreas_' . date('YmdHis');
    }
}



