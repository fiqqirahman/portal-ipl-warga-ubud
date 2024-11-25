<?php

namespace App\DataTables\Menu;

use App\Enums\PermissionEnum;
use App\Enums\StatusRegistrasiEnum;
use App\Models\RegistrasiVendor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
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
		    ->editColumn('status_registrasi', function ($row) {
                return $row->status_registrasi->badge();
            })
		    ->editColumn('created_at', function ($row) {
			    return dateWithFullMonthAndTimeFormat($row->created_at, FALSE);
		    })
		    ->editColumn('updated_at', function ($row) {
			    return ($row->created_at != $row->updated_at) ? dateWithFullMonthAndTimeFormat($row->updated_at, FALSE) : '-';
		    })
            ->addColumn('aksi', function ($row) {
	            $buttonEdit = '-';
				if(Auth::user()->hasPermissionTo(PermissionEnum::RegistrasiVendorEdit)){
	                if(in_array($row->status_registrasi->value, [StatusRegistrasiEnum::Draft->value, StatusRegistrasiEnum::RevisionDocuments->value])){
		                $buttonEdit = '<a href="'. route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($row->id)]) .'">
							<button type="button" class="btn btn-sm btn-info me-3">
								<i class="fa fa-pencil"></i> Edit
							</button>
						</a>';
	                }
				}
				return $buttonEdit;
            })
            ->rawColumns(['aksi','status_registrasi']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(RegistrasiVendor $model): QueryBuilder
    {
        return $model->newQuery()
	        ->where('created_by', Auth::id());
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
            ->orderBy(4, 'asc')
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
            Column::computed('status_registrasi'),
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
