<?php

namespace App\DataTables\Parking;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ParkingFee;
use App\Models\VehicleCategory;
use App\Models\ParkingArea;
use App\Models\Client;
use Helper;


class FeesDataTable extends DataTable
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

            $parking_area = ParkingArea::where('id', $parkingFee->parking_area_id)->value('name');
            $vehicleType = VehicleCategory::where('id', $parkingFee->vehicle_cat_id)->value('name');


            $btn = '<div class="row"><a href="javascript:void(0)" data-toggle="tooltip" 
            data-id="'.$parkingFee->id.'" data-name="'.$parking_area.'"  data-vehicletype="'.$vehicleType.'" id="edit-parking-fee" data-original-title="Edit" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>';

          
            $title = $parkingFee->is_deleted ? 'Restore' : 'Delete';

            if($parkingFee->is_deleted){
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$parkingFee->is_deleted.'"
                data-id="'.$parkingFee->id.'" data-name="'.$parking_area.'" data-vehicletype="'.$vehicleType.'" id="delete-parking-fee"  data-original-title="'.$title.'" 
                class="btn btn-warning btn-sm ml-2"><i class="fa fa-undo"></i></a></div>';
            }else{
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$parkingFee->is_deleted.'"
                data-id="'.$parkingFee->id.'" data-name="'.$parking_area.'" data-vehicletype="'.$vehicleType.'" id="delete-parking-fee" data-original-title="'.$title.'"  
                class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></div>';
            }

           return $btn;

        })->editColumn('fee', function ($parkingFee) {
             return number_format($parkingFee->fee);
        })->editColumn('is_deleted', function ($parkingFee) {
            return ($parkingFee->is_deleted)
              ? '<span class="text-danger">True</span>' 
              : '<span class="text-success">False</span>';
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
        })->rawColumns(['action', 'is_deleted', 'checkbox']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ParkingFee $model)
    {
        
            $endPoint = '/parking-fees';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $fees = ParkingFee::hydrate($data);
            foreach($fees as $fee){
                $fee->fee_per_hour = number_format($fee->fee_per_hour);
            }
            return $fees; 
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



