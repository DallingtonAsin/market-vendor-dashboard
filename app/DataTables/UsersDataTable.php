<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\User;
use Helper;


class UsersDataTable extends DataTable
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
        ->addColumn('action', function ($user) {
            
            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$user->id.'" data-original-title="Edit" wire:click="edit({{ $user->id }})" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

             <a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$user->id.'" data-original-title="View" id="view-user"
            class="btn btn-warning btn-sm ml-2"><i class="fa fa-trash"></i> <a href="javascript:void(0)" data-toggle="tooltip"
            data-id="'.$user->id.'" data-original-title="Delete" wire:click="delete({{ $user->id }})" 
            class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a>';

           return $btn;

        })->addColumn('checkbox', function ($user) {
              $checkBox = '<input type="checkbox" id="'.$user->id.'"/>';
             return $checkBox;
        })->editColumn('is_active', function ($data) {
           return ($data->is_active)
             ? '<span class="text-success">active</span>' 
             : '<span class="text-danger">inactive</span>';
        })->editColumn('account_action', function ($data) {
            $status = $data->is_active;
           return ($status)
             ? '<a class="btn btn-danger text-white changeAccountBtn" data-id="'.$data->id.'" data-name="'.$data->name.'" data-status="'.$status.'" id="changeAccountBtn"   >Deactive</a>' 
             : '<a class="btn btn-success text-white changeAccountBtn" data-id="'.$data->id.'" data-name="'.$data->name.'"  data-status="'.$status.'" id="changeAccountBtn" >Activate</a>';
        })->rawColumns(['action', 'checkbox', 'is_active', 'account_action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        
            $endPoint = '/users';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $data = User::hydrate($data);
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
                    ->setTableId('UsersDatatable')
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
            'username',
            'gender',
            'email',
            'user_role',
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
        return 'Users_' . date('YmdHis');
    }
}



