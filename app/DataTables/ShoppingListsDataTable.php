<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ShoppingList;
use Helper;


class ShoppingListsDataTable extends DataTable
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

        })->addColumn('checkbox', function ($data) {
              $checkBox = '<input type="checkbox" id="'.$data->id.'"/>';
             return $checkBox;
        })->editColumn('is_deleted', function ($data) {
            return ($data->is_deleted)
              ? '<span class="text-danger">True</span>' 
              : '<span class="text-success">False</span>';
         })->rawColumns(['action', 'checkbox', 'is_active', 'is_deleted']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ShoppingList $model)
    {
        
            $endPoint = '/shopping-lists';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $data = ShoppingList::hydrate($data);
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
        return 'ShoppingLists_' . date('YmdHis');
    }
}




