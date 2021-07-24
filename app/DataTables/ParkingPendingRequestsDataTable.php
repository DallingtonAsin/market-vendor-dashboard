<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ParkingRequest;
use Helper;

class ParkingPendingRequestsDataTable extends DataTable
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

            $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$request->id.'" data-original-title="Edit" id="edit-request" 
            class="btn btn-success edit-request btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$request->id.'" data-original-title="View" id="view-request"
            class="btn btn-warning text-white btn-sm ml-2"><i class="fa fa-eye"></i> <a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$request->id.'" data-original-title="Delete" id="delete-request" 
            class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a>';

            return $actionBtn;

        })->addColumn('checkbox', function ($request) {
          $checkBox = '<input type="checkbox" id="'.$request->id.'" telNumber="'.$request->telephone_no.'" vehicleNumber="'.$request->vehicle_number.'"/>';
          return $checkBox;
      })->addColumn('client', function ($request) {
       return Helper::getClientName($request->client_id);
   })->addColumn('parking_area', function ($request) {
       return Helper::getParkingAreaName($request->parking_area_id);
   })->addColumn('duration', function ($request) {
       $start_time = date('H:i', strtotime($request->start_time));
       $end_time = date('H:i', strtotime($request->end_time));
       return $start_time."-".$end_time; 
   })->addColumn('vehicle_type', function ($request) {
       $arr = Helper::getVehicleTypeName($request->vehicle_type_id);
       return $arr['data'];
   })->addColumn('manage', function ($request) {
       $btn = "";
       $btn .= '<a class="btn btn-success btn-sm text-white changeStatusBtn"
       data-id="'.$request   ->id.'" data-name="'.$request->id.'" id="changeStatusBtn" >Approve</a>';
       $btn .= '<a class="btn btn-warning btn-sm text-white ml-2 changeStatusBtn"
       data-id="'.$request->id.'" data-name="'.$request->id.'" id="changeStatusBtn" >Reject</a>';
       return $btn;
   })->editColumn('request_date', function ($request) {
       return date('Y-m-d', strtotime($request->request_date));
   })->editColumn('amount', function ($request) {
       return number_format($request->amount);
   })->rawColumns(['action', 'checkbox', 'manage']);
}

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ParkingRequest $model)
    {

        $endPoint = '/requests/pending';
        $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
        $apiResult = json_decode($resp, true);
        $data = $apiResult['data'];
            // dd($data);
            // $data = json_encode($data);
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
            Column::make('telephone_no'),
            Column::make('vehicle_number'),
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


