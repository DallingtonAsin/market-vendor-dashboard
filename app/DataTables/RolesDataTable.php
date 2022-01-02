<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\Role;
use Livewire\Livewire;
use Helper;


class RolesDataTable extends DataTable
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
        ->addColumn('action', function ($role) {
            $btn = '<div class="row"><a href="javascript:void(0)" data-toggle="tooltip" 
            data-id="'.$role->id.'" data-name="'.$role->name.'" id="edit-role" data-original-title="Edit" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>';

            $title = $role->is_deleted ? 'Restore' : 'Delete';

            if($role->is_deleted){
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$role->is_deleted.'"
                data-id="'.$role->id.'" data-name="'.$role->name.'" id="delete-role"  data-original-title="'.$title.'" 
                class="btn btn-warning btn-sm ml-2"><i class="fa fa-undo"></i></a></div>';
            }else{
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$role->is_deleted.'"
                data-id="'.$role->id.'" data-name="'.$role->name.'" id="delete-role" data-original-title="'.$title.'"  
                class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></div>';
            }
        

           return $btn;
        

        })->editColumn('is_deleted', function ($role) {
            return ($role->is_deleted)
              ? '<span class="text-danger">True</span>' 
              : '<span class="text-success">False</span>';
         })->addColumn('created_at', function ($role) {
           return date('Y-m-d H:i A', strtotime($role->created_at));
      })->addColumn('checkbox', function ($role) {
              $checkBox = '<input type="checkbox" id="'.$role->id.'"/>';
             return $checkBox;
        })->rawColumns(['action', 'is_deleted', 'checkbox']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
            $endPoint = '/roles';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $data = Role::hydrate($data);
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
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Roles_' . date('YmdHis');
    }
}




