<?php

namespace App\DataTables\Master;

use App\Models\Dokuman;
use App\Models\Master\Dokumen;
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

class DokumenDataTable extends DataTable
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
                $routeEdit = route('master.dokumen.edit', enkrip($row->id));
                $button = '<div class="d-flex justify-content-start">';
                $routeUpdateStatus = route($row->status_data == true ? 'master.dokumen.nonaktif' :
                    'master.dokumen.aktif', enkrip($row->id));
                $btnUpdate = '<a href="' . $routeEdit . '" class="btn btn-secondary btn-sm me-4">Ubah</a>';
                if ($row->status_data == true) {
                    $btnStatus = '<a href="' . $routeUpdateStatus . '" class="btn btn-danger btn-sm">Nonaktifkan</a>';
                } else {
                    $btnStatus = '<a href="' . $routeUpdateStatus . '" class="btn btn-primary btn-sm">Aktifkan</a>';
                }
                $button .= $btnUpdate . $btnStatus;
                $button .= '</div>';
                if (!Gate::allows('master_dokumen_edit')) {
                    $button = '-';
                }
                return $button;
            })
            ->editColumn('status_data', function ($row) {
                if ($row->status_data === true) {
                    $btnUnblock = '<span class="badge badge-light-primary">Aktif<span>';
                } else {
                    $btnUnblock = '<span class="badge badge-light-danger">Tidak Aktif<span>';
                }
                return $btnUnblock;
            })
            ->editColumn('is_required', function ($row) {
                if ($row->status_data === true) {
                    $btnUnblock = '<span class="badge badge-light-danger">Mandatory<span>';
                } else {
                    $btnUnblock = '<span class="badge badge-light-primary">Tidak Mandatory<span>';
                }
                return $btnUnblock;
            })
            ->editColumn('max_file_size', function ($row) {
                return '<span class="badge badge-light-success">' . $row->max_file_size . ' KB</span>';
            })
            ->editColumn('allowed_file_types', function ($row) {
                $fileTypes = json_decode($row->allowed_file_types, true);
                $formattedTypes = implode(', ', $fileTypes);
                return '<span class="badge badge-light-success">.' . str_replace(',', ', .', $formattedTypes) . '</span>';
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->locale(config('app.locale'))
                    ->translatedFormat('j F Y, H:i:s');
            })
            ->rawColumns(['aksi', 'status_data','is_required','max_file_size','allowed_file_types']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Dokumen $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dokumen')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-2'f><'col-sm-10'>>" . "<'row'<'col-sm-12'tr>>" .
                "<'row'<'col-sm-1 mt-1'l><'col-sm-4 mt-3'i><'col-sm-7'p>>")
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
            Column::make('nama_dokumen'),
            Column::make('keterangan'),
            Column::make('is_required')->title('Dokumen Mandatory'),
            Column::make('max_file_size')->title('Maksimal Dokumen Size'),
            Column::make('allowed_file_types')->title('Tipe Dokumen yang Diizinkan'),
            Column::make('status_data')
                ->searchable(false)
                ->orderable(false)
                ->width(100)
                ->addClass('text-center min-w-100px'),
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
        return 'Dokumen_' . date('YmdHis');
    }
}
