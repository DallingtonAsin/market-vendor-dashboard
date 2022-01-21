<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ShoppingOrder;
use Helper;
use Illuminate\Support\Facades\Gate;
use Auth;


class PendingShoppingOrdersDataTable extends DataTable
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
        ->addColumn('action', function ($data) {

    
            $btn = '<div class="row"><a href="javascript:void(0)" data-toggle="tooltip" 
            data-id="'.$data->id.'" id="edit-data" data-original-title="Edit" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>';

            $title = $data->is_deleted ? 'Restore' : 'Delete';

            if($data->is_deleted){
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$data->is_deleted.'"
                data-id="'.$data->id.'"  id="delete-data"  data-original-title="'.$title.'" 
                class="btn btn-warning btn-sm ml-2"><i class="fa fa-undo"></i></a></div>';
            }else{
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$data->is_deleted.'"
                data-id="'.$data->id.'" id="delete-data" data-original-title="'.$title.'"  
                class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></div>';
            }
           return $btn;

        })->editColumn('status', function ($data) {
            return ($data->status == 'PENDING')
              ? '<span class="text-danger">PENDING</span>' 
              : '<span class="text-success">PROCESSED</span>';
         })->addColumn('checkbox', function ($data) {
              $checkBox = '<input type="checkbox" id="'.$data->id.'"/>';
             return $checkBox;
        })->addColumn('action_status', function ($data) {
            $btn = "";
            $title = $data->status == 'PENDING' ? 'Mark processed' : 'Mark Pending';
            if($data->status == 'PENDING'){
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-status="'.$data->status.'"
                data-id="'.$data->id.'"  id="change-order-status"  data-original-title="'.$title.'" 
                class="btn btn-success btn-sm ml-2">Mark processed</a></div>';
            }else{
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-status="'.$data->status.'"
                data-id="'.$data->id.'" id="change-order-status" data-original-title="'.$title.'"  
                class="btn btn-warning btn-sm ml-2"><i class="fa fa-undo"></i> Mark pending</a></div>';
            }
            return $btn;
      })->editColumn('is_deleted', function ($data) {
            return ($data->is_deleted)
              ? '<span class="text-danger">True</span>' 
              : '<span class="text-success">False</span>';
         })->rawColumns(['action', 'checkbox', 'is_active', 'is_deleted', 'status', 'action_status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ShoppingOrder $model)
    {
        
            
            $response = Gate::inspect('isAdmin');
            if($response->allowed()){
                $endPoint = '/shopping-orders/pending';
            }else{
                $endPoint = '/vendor/myorders/pending/'.Auth::user()->id;
            }
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $data = ShoppingOrder::hydrate($data);
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
                    ->setTableId('ShoppingListsDatatable')
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
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PendingShoppingLists_' . date('YmdHis');
    }
}




