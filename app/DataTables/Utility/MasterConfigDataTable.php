<?php

namespace App\DataTables\Utility;

use App\Enums\MasterConfigTypeEnum;
use App\Models\Utility\MasterConfig;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MasterConfigDataTable extends DataTable
{
	/**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return DataTableAbstract
	 * @throws Exception
	 */
    public function dataTable(mixed $query): DataTableAbstract
    {
        return datatables()
	        ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return dateWithFullMonthAndTimeFormat($row->created_at, FALSE);
            })
	        ->editColumn('updated_at', function ($row) {
		        return ($row->created_at != $row->updated_at) ? dateWithFullMonthAndTimeFormat($row->created_at, FALSE) : '-';
	        })
	        ->editColumn('value', function ($row) {
		        if($row->type === MasterConfigTypeEnum::Boolean){
					return $row->value == '0' ? 'Tidak' : 'Ya';
		        }
				
				return $row->value;
	        })
	        ->addColumn('aksi', function ($row) {
				if($row->is_private) {
					return '-';
				}
		        $routeDetail = route('utility.master-config.edit', ['master_config' => enkrip($row->id)]);
		        return '<a href="'. $routeDetail .'" class="btn btn-sm btn-info btn-detail-sidang">
		            Detail
		        </a>';
	        })
	        ->rawColumns(['aksi']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param MasterConfig $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MasterConfig $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->newQuery()->orderBy('key');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('master-config-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-2'f><'col-sm-10'>>" . "<'row'<'col-sm-12'tr>>" . "<'row'<'col-sm-1 mt-1'l><'col-sm-4 mt-3'i><'col-sm-7'p>>")
            ->buttons([''])
            ->scrollX(true)
            // ->scrollY('500px')
            ->fixedColumns(['left' => 1])
            ->language(['processing' => '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'])
            ->orderBy(0)
            ->parameters([
                "lengthMenu" => [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ]
            ])
            ->addTableClass('table align-middle table-rounded table-striped table-row-gray-300 fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No.')->searchable(false)->orderable(false)->addClass('text-center'),
            Column::make('key')->title('Key'),
            Column::make('value')->title('Value'),
            Column::make('description')->title('Keterangan'),
            Column::make('created_at')->title('Dibuat Pada'),
            Column::make('updated_at')->title('Diupdate Pada'),
	        Column::computed('aksi')
		        ->searchable(false)
		        ->orderable(false)
		        ->exportable(false)
		        ->printable(false)
		        ->width(100)
		        ->title('Aksi')
		        ->addClass('text-center min-w-100px'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Master Config_' . date('YmdHis');
    }
}
