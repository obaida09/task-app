<?php

namespace App\DataTables;

use App\Models\PathologicalCase;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class PathologicalCaseDatatable extends DataTable
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
            ->addColumn('action', 'pathological_cases.action.buttons')
            ->editColumn('content', function (PathologicalCase $data) {
                return Str::limit($data->content, 65);
            })
            ->editColumn('created_at', function (PathologicalCase $PathologicalCase) {
                return $PathologicalCase->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function (PathologicalCase $PathologicalCase) {
                return $PathologicalCase->updated_at->toFormattedDateString();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PathologicalCase $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PathologicalCase $model)
    {
        return $model->newQuery()->with('category')->select('pathological_cases.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('pathologicalcasedatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->parameters([
                        'dom' => 'Blfrtip',
                        'responsive' => true,
                        'autoWidth' => false,
                        'lengthMenu' => [[10, 25, 50], [10, 25, 50]],
                        'buttons' => ['excel', 'csv', 'pdf', 'reset'],
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
            Column::make('id')
                ->className('text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3'),
            Column::make('content')
                ->width(610),
            Column::make('key_word')
                ->width(10)
                ->className('hid'),
            Column::computed('Category')
                ->data('category.name'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(110)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PathologicalCase_' . date('YmdHis');
    }
}
