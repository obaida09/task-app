<?php

namespace App\DataTables;

use App\Models\SessionDetails;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class SessionsDetailsDatatable extends DataTable
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
            ->addColumn('action', 'sessions_details.action.buttons')
            ->editColumn('session_notes', function (SessionDetails $data) {
                return Str::limit($data->session_notes, 35);
            })
            ->editColumn('created_at', function (SessionDetails $session_details) {
                return $session_details->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function (SessionDetails $session_details) {
                return $session_details->updated_at->toFormattedDateString();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SessionDetailsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SessionDetails $model)
    {
        return $model->your_sessions_details()->newQuery()->with('session')->select('session_details.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('sessionsdetailsdatatable-table')
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
            Column::make('session_notes'),
            Column::computed('Session')
                ->data('session.date_time'),
            Column::make('marital_status'),
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
        return 'SessionsDetails_' . date('YmdHis');
    }
}
