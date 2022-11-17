<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

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
        return datatables()
            ->eloquent($query)
            ->editColumn('active', function ($model) {
                if($model->active == User::ACTIVE) {
                    $btn_class  = '<span class="badge badge-sm bg-gradient-success">Active</span>';
                } elseif($model->active == User::INACTIVE) {
                    $btn_class    = '<span class="badge badge-sm bg-gradient-danger">InActive</span>';
                }
                return $btn_class;
            })
            ->addColumn('action', function($model) {
                $btn = '';
                $btn = '<a href="'.route('admin.users.edit', [$model->id]).'" class="btn bg-gradient-info font-weight-bold text-xs" title="Edit">Edit</a>';
                $btn .= '&nbsp;<a href="javascript:void(0)" class="btn bg-gradient-danger font-weight-bold text-xs  btn-delete" title="Delete" data-delete-route="'.route('admin.users.destroy', $model->id).'">Delete</a>';
                return $btn;
            })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('lBfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
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
            Column::make('name'),
            Column::make('email'),
            Column::make('active'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() :string
    {
        return 'Users_' . date('YmdHis');
    }
}
