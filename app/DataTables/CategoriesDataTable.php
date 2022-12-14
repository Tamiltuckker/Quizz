<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoriesDataTable extends DataTable
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
            ->editColumn('name', function ($model) {
                if($model->image !== null) {
                    $profileImage  = '<img src="../storage/image/' . $model->image->image . '" class="avatar avatar-sm me-3"   alt="category">' . $model->name;
                } else {
                    $profileImage  = '<img src= "../assets/img/user.png"  class="avatar avatar-sm me-3"  alt="cat">' . $model->name;
                }
                return  $profileImage;
            })
            ->editColumn('active', function ($model) {
                if ($model->active == Category::ACTIVE) {
                    $btn_class  = '<span class="badge badge-sm bg-gradient-success">Active</span>';
                } elseif ($model->active == Category::INACTIVE) {
                    $btn_class    = '<span class="badge badge-sm bg-gradient-danger">InActive</span>';
                }
                return $btn_class;
            })
            ->addColumn('action', function ($model) {
                $btn = '';
                $btn = '<a href="' . route('admin.categories.edit', [$model->id]) . '" class="btn bg-gradient-info font-weight-bold text-xs" title="Edit">Edit</a>';
                $btn .= '&nbsp;<a href="javascript:void(0)" class="btn bg-gradient-danger font-weight-bold text-xs  btn-delete" title="Delete" data-delete-route="' . route('admin.categories.destroy', $model->id) . '">Delete</a>';
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
    public function query(Category $model)
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
            ->setTableId('categories-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lBfrtip')
            ->orderBy(1)
            ->buttons(
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
            Column::computed('name')
                ->orderable(true)
                ->searchable(true),
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
    // protected function filename()
    // {
    //     return 'Categories_' . date('YmdHis');
    // }
}
