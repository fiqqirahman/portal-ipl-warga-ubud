<?php

namespace App\DataTables\Menu;

use App\Models\RegistrasiVendor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VendorPeroranganDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
	    return (new EloquentDataTable($query))
		    ->addIndexColumn()
            ->editColumn('nama', function ($row) {
                return $row->nama ?? '-';
            })
		    ->editColumn('nama_singkatan', function ($row) {
                return $row->nama_singkatan ?? '-';
            })
		    ->editColumn('created_by', function ($row) {
                return $row->createdBy?->name ?? '-';
            })
            ->editColumn('updated_by', function ($row) {
                return $row->updatedBy?->name ?? '-';
            })
		    ->editColumn('created_at', function ($row) {
			    return dateWithFullMonthAndTimeFormat($row->created_at, FALSE);
		    })
		    ->editColumn('updated_at', function ($row) {
			    return ($row->created_at != $row->updated_at) ? dateWithFullMonthAndTimeFormat($row->updated_at, FALSE) : '-';
		    })
            ->addColumn('aksi', function ($row) {
                return 'Aksi';
            })
            ->rawColumns(['aksi']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(RegistrasiVendor $model): QueryBuilder
    {
        return $model->newQuery()->with(['updatedBy','createdBy']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendor-perorangan')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-2'f><'col-sm-10'>>" . "<'row'<'col-sm-12'tr>>" . "<'row'<'col-sm-1 mt-1'l><'col-sm-4 mt-3'i><'col-sm-7'p>>")
            ->buttons([''])
            ->scrollX(true)
            ->scrollY('500px')
            ->fixedColumns(['left' => 1, 'right' => 1])
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
	        Column::make('DT_RowIndex')->title('No.')->searchable(false)->orderable(false)->addClass('text-center'),
            Column::make('nama'),
            Column::make('nama_singkatan'),
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
	        Column::make('created_at')->title('Dibuat Pada'),
	        Column::make('updated_at')->title('Diupdate Pada'),
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
        return 'VendorPerorangan_' . date('YmdHis');
    }
}
