<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\Customer;
use Helper;


class CustomersDataTable extends DataTable
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
        ->addColumn('action', function ($customer) {

            $name = $customer->first_name." ".$customer->last_name;
            
            $btn = '<div class="row"><a href="javascript:void(0)" data-toggle="tooltip" 
            data-id="'.$customer->id.'" data-name="'.$name.'" id="edit-customer" data-original-title="Edit" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>';

            $title = $customer->is_deleted ? 'Restore' : 'Delete';

            if($customer->is_deleted){
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$customer->is_deleted.'"
                data-id="'.$customer->id.'" data-name="'.$name.'" id="delete-customer"  data-original-title="'.$title.'" 
                class="btn btn-warning btn-sm ml-2"><i class="fa fa-undo"></i></a></div>';
            }else{
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$customer->is_deleted.'"
                data-id="'.$customer->id.'" data-name="'.$name.'" id="delete-customer" data-original-title="'.$title.'"  
                class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></div>';
            }
        
         

           return $btn;

        })->addColumn('checkbox', function ($customer) {
              $checkBox = '<input type="checkbox" id="'.$customer->id.'"/>';
             return $checkBox;
        })->editColumn('is_active', function ($data) {
           return ($data->is_active)
             ? '<span class="text-success">active</span>' 
             : '<span class="text-danger">inactive</span>';
        })->editColumn('is_deleted', function ($customer) {
            return ($customer->is_deleted)
              ? '<span class="text-danger">True</span>' 
              : '<span class="text-success">False</span>';
         })->editColumn('account_action', function ($data) {
            $status = $data->is_active;
           return ($status)
             ? '<a class="btn btn-danger text-white changeAccountBtn" style="width:100px" data-status="'.$data->is_active.'" data-id="'.$data->id.'" data-name="'.$data->name.'" data-status="'.$status.'" id="changeAccountBtn"   >Deactivate</a>' 
             : '<a class="btn btn-success  text-white changeAccountBtn" style="width:100px" data-status="'.$data->is_active.'" data-id="'.$data->id.'" data-name="'.$data->name.'"  data-status="'.$status.'" id="changeAccountBtn" >Activate</a>';
        })->rawColumns(['action', 'checkbox', 'is_active', 'is_deleted', 'account_action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(customer $model)
    {
        
            $endPoint = '/customers';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $data = customer::hydrate($data);
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
                    ->setTableId('customersDatatable')
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
            'first_name',
            'last_name',
            'name',
            'customername',
            'gender',
            'email',
            'customer_role',
            'tel_no',
            'alt_telno',
            'address',
            'nationalID_no',
            'image',
            'password'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'customers_' . date('YmdHis');
    }
}



