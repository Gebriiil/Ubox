<?php

namespace App\DataTables;

use Modules\BlogModule\Entities\Blog;
use Yajra\DataTables\Services\DataTable;

class BlogDatatable extends DataTable
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
            ->addColumn('action', 'blogdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Blog::query();
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
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'Id',
            ],[
                'name'=>'title',
                'data'=>'title',
                'title'=>'Title',
            ],[
                'name'=>'desc',
                'data'=>'desc',
                'title'=>'Description',
            ],[
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=>'created_at',
            ],[
                'name'=>'updated_at',
                'data'=>'updated_at',
                'title'=>'updated_at',
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Blog_' . date('YmdHis');
    }
}
