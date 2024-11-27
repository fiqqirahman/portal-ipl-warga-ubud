<?php

namespace App\Services;

use App\Enums\DocumentForEnum;
use App\Models\Master\Dokumen;
use App\Models\Master\DokumenVendor;
use App\Models\RegistrasiVendor;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class InventarisService
{
	public static function store(RegistrasiVendor $model, ?array $inventarisRequest = []): void
	{
		if($inventarisRequest) {
			$prefix = $model->no_vendor;
			$pathFile = 'vendor-registration/' . $model->createdBy->vendor_type->value . '/' . $prefix . '/inventaris';
			
			$inventarisRequest = collect($inventarisRequest)->map(function ($item) use ($pathFile) {
				if(isset($item['path_upload_inventaris']) && $item['path_upload_inventaris']){
					return [
						...$item,
						'path_upload_inventaris' => UploadFileService::nullable()->create($item['path_upload_inventaris'], $pathFile),
					];
				}
				
				return $item;
			});
			
			$model->inventaris = json_encode($inventarisRequest);
			$model->saveQuietly();
		}
	}
	
	public static function update(RegistrasiVendor $model, ?array $inventarisRequest = []): void
	{
		if($inventarisRequest) {
			$prefix = $model->no_vendor;
			$pathFile = 'vendor-registration/' . $model->createdBy->vendor_type->value . '/' . $prefix . '/inventaris';
			
			$inventarisRequest = collect($inventarisRequest)->map(function ($item) use ($pathFile) {
				if(isset($item['path_upload_inventaris']) && $item['path_upload_inventaris']){
					if(isset($item['path_upload_inventaris_old']) && $item['path_upload_inventaris_old']){
						UploadFileService::delete($item['path_upload_inventaris_old']);
					}
					return [
						...$item,
						'path_upload_inventaris' => UploadFileService::nullable()->update($item['path_upload_inventaris'], $pathFile, $item['path_upload_inventaris']),
					];
				} else if (isset($item['path_upload_inventaris_old']) && $item['path_upload_inventaris_old']) {
					return [
						...$item,
						'path_upload_inventaris' => $item['path_upload_inventaris_old'],
					];
				}
				
				return $item;
			});
			
			$model->inventaris = json_encode($inventarisRequest);
			$model->saveQuietly();
		}
	}
}
