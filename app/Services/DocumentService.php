<?php

namespace App\Services;

use App\Enums\MasterDokumenEnum;
use App\Models\Master\Dokumen;
use App\Models\Master\DokumenVendor;
use App\Models\RegistrasiVendor;
use Exception;
use Throwable;

class DocumentService
{
	public static function makeFields(bool $isIndividual, ?RegistrasiVendor $registrasiVendor = null): array
	{
		$fields = [];
		$ids = $isIndividual ? MasterDokumenEnum::groupIndividual() : MasterDokumenEnum::groupCompany();
		$documents = Dokumen::isActive()->whereIn('id', $ids)->get();
		
		$documents->map(function ($document) use (&$fields, $registrasiVendor) {
			$fields[] = [
				'id' => 'document_' . $document->id,
				'name' => 'document_' . $document->id,
				'label' => $document->nama_dokumen,
				'is_required' => $document->is_required,
				'max_file_size' => $document->max_file_size,
				'allowed_file_types' => $document->allowed_file_types,
				'old_value' => $registrasiVendor ? DokumenVendor::where('id_history_registrasi_vendor', $registrasiVendor->id)
					->where('id_master_dokumen', $document->id)->first()?->toArray() ?? null : null
			];
		});
		
		return $fields;
	}
	
	public static function makeValidationRules(bool $isIndividual, string $isRequired, ?RegistrasiVendor $registrasiVendor = null): array
	{
		$rules = [];
		$ids = $isIndividual ? MasterDokumenEnum::groupIndividual() : MasterDokumenEnum::groupCompany();
		$documents = Dokumen::isActive()->whereIn('id', $ids)->get();
		
		$registrasiVendorId = $registrasiVendor?->id ?? null;
		
		$documents->map(function ($document) use (&$rules, $isRequired, $registrasiVendorId) {
			$existsOldValue = DokumenVendor::where('id_history_registrasi_vendor', $registrasiVendorId)
				->where('id_master_dokumen', $document->id)->exists();
			
			$rules['document_' . $document->id] = [
				($document->is_required) ? ($existsOldValue) ? 'nullable' : $isRequired : 'nullable',
				'mimes:' . implode(',', $document->allowed_file_types),
				'max:' . $document->max_file_size
			];
		});
		
		return $rules;
	}
	
	public static function makeValidationAttributes(bool $isIndividual): array
	{
		$attributes = [];
		$ids = $isIndividual ? MasterDokumenEnum::groupIndividual() : MasterDokumenEnum::groupCompany();
		$documents = Dokumen::isActive()->whereIn('id', $ids)->get();
		
		$documents->map(function ($document) use (&$attributes) {
			$attributes['document_' . $document->id] = $document->nama_dokumen;
		});
		
		return $attributes;
	}
	
	/**
	 * @throws Exception
	 */
	public static function store(RegistrasiVendor $model, array $files): bool
	{
		try {
			$isCompany = $model->is_company ? 'company' : 'individual';
			$prefix = $model->created_at->format('Ymd-His');
			$pathFile =  $isCompany . '/' . $prefix;
			
			foreach($files as $key => $file) {
				$idDocument = str_replace('document_', '', $key);
				$document = Dokumen::query()->find($idDocument);
				
				$model->documents()->create([
					'id_master_dokumen' => $document->id,
					'nama_dokumen' => $document->nama_dokumen,
					'keterangan_dokumen' => $document->keterangan,
					'additional_info' => json_encode(UploadFileService::getAdditionalInfo($file)),
					'path' => UploadFileService::create($file, $pathFile),
				]);
			}
			
			return true;
		} catch (Throwable $th) {
			logException('[DocumentService] store Failed Store', $th);
			
			throw new Exception($th->getMessage());
		}
	}
	
	/**
	 * @throws Exception
	 */
	public static function update(RegistrasiVendor $model, array $files): bool
	{
		try {
			$isCompany = $model->is_company ? 'company' : 'individual';
			$prefix = $model->created_at->format('Ymd-His');
			$pathFile =  $isCompany . '/' . $prefix;
			
			foreach($files as $key => $file) {
				$idDocument = str_replace('document_', '', $key);
				$document = Dokumen::query()->find($idDocument);
				
				$oldDocument = $model->documents()->where('id_master_dokumen', $document->id)->first();
				
				if($oldDocument) {
					$oldDocument->update([
						'id_master_dokumen' => $document->id,
						'nama_dokumen' => $document->nama_dokumen,
						'keterangan_dokumen' => $document->keterangan,
						'additional_info' => json_encode(UploadFileService::getAdditionalInfo($file)),
						'path' => UploadFileService::update($file, $pathFile, $oldDocument->path),
					]);
				} else {
					$model->documents()->create([
						'id_master_dokumen' => $document->id,
						'nama_dokumen' => $document->nama_dokumen,
						'keterangan_dokumen' => $document->keterangan,
						'additional_info' => json_encode(UploadFileService::getAdditionalInfo($file)),
						'path' => UploadFileService::create($file, $pathFile),
					]);
				}
			}
			
			return true;
		} catch (Throwable $th) {
			logException('[DocumentService] update Failed Update', $th);
			
			throw new Exception($th->getMessage());
		}
	}
}
