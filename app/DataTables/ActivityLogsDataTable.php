<?php

namespace App\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\ApiRequestResponse;
use App\Models\ActivityLog;
use Livewire\Livewire;
use Helper;


class ActivityLogsDataTable extends DataTable
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
        ->addColumn('date', function ($data) {
             return date('Y-m-d', strtotime($data->date));
        })->addColumn('time', function ($data) {
             return date('H:i A', strtotime($data->date));
        });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \request $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ActivityLog $model)
    {
        
            $endPoint = '/logs';
            $resp = ApiRequestResponse::GetDataByEndPoint($endPoint);
            $apiResult = json_decode($resp, true);
            $data = $apiResult['data'];
            $data = ActivityLog::hydrate($data);
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
            'mobile_number',
            'email'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ActivityLogs_' . date('YmdHis');
    }
}



