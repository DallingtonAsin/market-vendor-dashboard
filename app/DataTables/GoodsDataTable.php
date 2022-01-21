<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\Good;
use Livewire\Livewire;
use Helper;


class GoodsDataTable extends DataTable
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
        ->addColumn('action', function ($good) {
            $btn = '<div class="row"><a href="javascript:void(0)" data-toggle="tooltip" 
            data-id="'.$good->id.'" data-name="'.$good->name.'" id="edit-good" data-original-title="Edit" 
            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>';

            $title = $good->is_deleted ? 'Restore' : 'Delete';

            if($good->is_deleted){
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$good->is_deleted.'"
                data-id="'.$good->id.'" data-name="'.$good->name.'" id="delete-good"  data-original-title="'.$title.'" 
                class="btn btn-warning btn-sm ml-2"><i class="fa fa-undo"></i></a></div>';
            }else{
                $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-deleted="'.$good->is_deleted.'"
                data-id="'.$good->id.'" data-name="'.$good->name.'" id="delete-good" data-original-title="'.$title.'"  
                class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></div>';
            }
        

           return $btn;
        

        })->editColumn('is_deleted', function ($good) {
            return ($good->is_deleted)
              ? '<span class="text-danger">True</span>' 
              : '<span class="text-success">False</span>';
         })->addColumn('created_at', function ($good) {
           return date('Y-m-d H:i A', strtotime($good->created_at));
      })->addColumn('checkbox', function ($good) {
              $checkBox = '<input type="checkbox" id="'.$good->id.'"/>';
             return $checkBox;
        })->rawColumns(['action', 'is_deleted', 'checkbox']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Good $model)
    {
            $endPoint = '/goods';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $data = Good::hydrate($data);
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
                    ->setTableId('GoodsDatatable')
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
        return 'Goods_' . date('YmdHis');
    }
}




