<?php

namespace App\DataTables;

use App\Models\Session;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SessionsDatatable extends DataTable
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
            ->addColumn('action', 'sessions.action.buttons')
            ->editColumn('created_at', function (Session $session) {
                return $session->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function (Session $session) {
                return $session->updated_at->toFormattedDateString();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SessionsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Session $model)
    {
        return $model->your_sessions()->newQuery()->with('patient')->select('sessions.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('sessionsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'dom' => 'Blfrtip',
                        'responsive' => true,
                        'autoWidth' => false,
                        'lengthMenu' => [[10, 25, -1], [10, 25, 'All Record']],
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
            Column::make('date_time'),
            Column::computed('The Patient')
                ->data('patient.name'),
            Column::make('session_status'),
            Column::make('payment_status'),
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
        return 'Sessions_' . date('YmdHis');
    }
}
