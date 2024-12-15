<?php

namespace App\DataTables;

use App\Enums\PermissionEnum;
use App\Models\IplPayment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PembayaranIPLDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent(
                $query->with(['createdBy', 'updatedBy'])
            )
            ->addIndexColumn()
            ->editColumn('created_by', function ($row) {
                return $row->createdBy->name ?? '-';
            })

            ->editColumn('updated_by', function ($row) {
                return $row->updatedBy->name ?? '-';
            })
            ->addColumn('aksi', function ($row) {
                $routeEdit = route('menu.pembayaran-ipl.edit', enkrip($row->id));
                $button = '<div class="d-flex justify-content-start">';
                $btnUpdate = '<a href="' . $routeEdit . '" class="btn btn-secondary btn-sm me-4">Ubah</a>';

                $button .= $btnUpdate;
                $button .= '</div>';
                if (!Gate::allows(PermissionEnum::PembayaranIPLEdit->value)) {
                    $button = '-';
                }
                return $button;
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->locale(config('app.locale'))->translatedFormat('j F Y, H:i:s');
            })
            ->rawColumns(['aksi',]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(IplPayment $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pembayaranipl-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-2'f><'col-sm-10'>>" . "<'row'<'col-sm-12'tr>>" . "<'row'<'col-sm-1 mt-1'l><'col-sm-4 mt-3'i><'col-sm-7'p>>")
            ->buttons([''])
            ->scrollX(true)
            ->scrollY('500px')
            ->fixedColumns(['left' => 2, 'right' => 2])
            ->language(['processing' => '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'])
            ->orderBy(0, 'asc')
            ->parameters([
                "lengthMenu" => [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ]
            ])
            ->addTableClass('table align-middle table-rounded table-striped table-row-gray-300 fs-6 gy-5');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No.')->searchable(false)->orderable(false)
                ->addClass('text-center'),
            Column::make('user-id')->title('Nama')->searchable(false)->orderable(false),
            Column::make('amount')->title('Jumlah Pembayaran')->searchable(false)->orderable(false),
            Column::make('method')->title('Metode Pembayaran')->searchable(false)->orderable(false),
            Column::make('proof')->title('Bukti Pembayaran')->searchable(false)->orderable(false),
            Column::make('created_by')
                ->title('Dibuat Oleh')
                ->searchable(false)
                ->orderable(false)
                ->width(100)
                ->addClass('text-center min-w-100px'),
            Column::make('updated_by')
                ->title('Diubah Oleh')
                ->searchable(false)
                ->orderable(false)
                ->width(100)
                ->addClass('text-center min-w-100px'),
            Column::computed('aksi')
                ->searchable(false)
                ->orderable(false)
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center min-w-100px'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PembayaranIPL_' . date('YmdHis');
    }
}
