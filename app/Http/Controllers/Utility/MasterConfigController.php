<?php

namespace App\Http\Controllers\Utility;

use App\DataTables\Utility\MasterConfigDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\Utility\MasterConfigUpdateRequest;
use App\Models\Utility\MasterConfig;
use Exception;
use Illuminate\Support\Facades\Auth;

class MasterConfigController extends Controller
{
	private static string $title = 'Master Config';
	
	static function breadcrumb()
	{
		return [
			self::$title, route('utility.master-config.index')
		];
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @param MasterConfigDataTable $dataTable
	 * @return mixed
	 */
	public function index(MasterConfigDataTable $dataTable)
	{
		$data = [
			'title' => 'Data ' . self::$title,
			'breadcrumbs' => [
				HomeController::breadcrumb(),
				['Utility', '#'],
				self::breadcrumb()
			]
		];
		
		return $dataTable->render('dashboard.utility.master-config.index', $data);
	}
	
	public function edit(MasterConfig $masterConfig)
	{
		if($masterConfig->is_private){
			abort(404);
		}
		
		$title = 'Ubah Data ' . self::$title;
		
		$breadcrumbs = [
			HomeController::breadcrumb(),
			['Utility', '#'],
			self::breadcrumb(),
			[$title, route('utility.master-config.edit', ['master_config' => enkrip($masterConfig->id)])],
		];
		
		$data = [
			'title' => $title,
			'breadcrumbs' => $breadcrumbs,
			'masterConfig' => $masterConfig
		];
		
		return view('dashboard.utility.master-config.edit', $data);
	}
	
	
	public function update(MasterConfigUpdateRequest $request, MasterConfig $masterConfig)
	{
		try {
			if($masterConfig->is_private){
				abort(404);
			}
			
			$masterConfig->update([
				'value' => $request->value,
				'description' => $request->description,
			]);
			
			$logMessage = Auth::user()->name . ' Memperbarui Data Master Config Key : <b>'
				. $masterConfig->key . '</b> | Value : <b>' . $masterConfig->value . '</b> '
				. ' ke <b>' . $request->value . '</b>';
			
			createLogActivity($logMessage);
			
			sweetAlert('success','Master Config Key ' . $masterConfig->key . ' berhasil diperbarui');
			return to_route('utility.master-config.index');
		} catch (Exception $e) {
			sweetAlertException('Master Config gagal diperbarui', $e);
			return to_route('utility.master-config.edit', ['master_config' => enkrip($masterConfig->id)]);
		}
	}
}
