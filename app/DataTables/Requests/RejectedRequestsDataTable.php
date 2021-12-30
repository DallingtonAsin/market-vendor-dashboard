<?php

namespace App\DataTables\Requests;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ParkingRequest;
use Helper;

class RejectedRequestsDataTable extends DataTable
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
            ->addColumn('action', function ($request) {
                
            $actionBtn = '<div class="row"><a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$request->id.'" data-original-title="Edit" id="edit-request" 
            class="btn btn-success edit-request btn-sm"><i class="fa fa-pencil"></i></a>
             <a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$request->id.'" data-original-title="View" id="view-request"
            class="btn btn-warning text-white btn-sm ml-2"><i class="fa fa-eye"></i> <a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$request->id.'" data-original-title="Delete" id="delete-request" 
            class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></div>';

           return $actionBtn;

        })->addColumn('checkbox', function ($request) {
              $checkBox = '<input type="checkbox" id="'.$request->id.'"/>';
             return $checkBox;
        })->addColumn('parking_area', function ($request) {
             return Helper::getParkingAreaName($request->parking_area_id);
        })->addColumn('duration', function ($request) {
             $start_time = date('H:i', strtotime($request->start_time));
             $end_time = date('H:i', strtotime($request->end_time));
             return $start_time."-".$end_time;
        })->addColumn('vehicle_type', function ($request) {
                 $arr = Helper::getVehicleTypeName($request->vehicle_cat_id);
                 return $arr['data'];
        })->editColumn('request_date', function ($request) {
             return date('Y-m-d', strtotime($request->request_date));
        })->editColumn('reject_date', function ($request) {
             return date('Y-m-d', strtotime($request->reject_date));
        })->editColumn('amount', function ($request) {
             return number_format($request->amount);
        })->rawColumns(['action', 'checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ParkingRequest $model)
    {
        
            $endPoint = '/requests/rejected';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $data = ParkingRequest::hydrate($data);
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
                    ->setTableId('RequestsDatatable')
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
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::computed('checkbox') ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('username'),
            Column::make('telephone'),
            Column::make('car_number'),
            Column::make('status'),
            Column::make('request_date'),
             Column::make('approval_date'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Requests_' . date('YmdHis');
    }
}


