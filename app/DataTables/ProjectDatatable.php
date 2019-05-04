<?php

namespace App\DataTables;

use  Modules\TrainingModule\Entities\Training;
use Yajra\DataTables\Services\DataTable;

class ProjectDatatable extends DataTable
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
            ->addColumn('action', 'projectdatatable.action');
    }

    /**
     * Get query source of dataTable.
     * 
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Training $model)
    {
        return Training::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters([
                        'dom'=>'Blfrtip',
                        'lengthMenu'=>[ [10,25,50,100] , [10,25,50,'All Records'] ],
                        'buttons'=>[
                            ['extend'=>'csv' , 'className'=>'btn btn-primary'  , 'text'=>'csv'],
                            ['extend'=>'print' , 'className'=>'btn btn-info'  , 'text'=>'print'],
                        ]
                    ]);
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
            'desc',
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
        return 'Project_' . date('YmdHis');
    }
}
