<?php

namespace App\Services;

use App\Enums\MasterDokumenEnum;
use App\Models\Master\Dokumen;

class DocumentService
{
	public static function makeFields(bool $isIndividual): array
	{
		$fields = [];
		$ids = $isIndividual ? MasterDokumenEnum::groupIndividual() : MasterDokumenEnum::groupCompany();
		$documents = Dokumen::isActive()->whereIn('id', $ids)->get();
		
		$documents->map(function ($document) use (&$fields) {
			$fields[] = [
				'id' => 'document_' . $document->id,
				'name' => 'document_' . $document->id,
				'label' => $document->nama_dokumen,
				'is_required' => $document->is_required,
				'max_file_size' => $document->max_file_size,
				'allowed_file_types' => $document->allowed_file_types
			];
		});
		
		return $fields;
	}
	
	public static function makeValidationRules(bool $isIndividual, string $isRequired): array
	{
		$rules = [];
		$ids = $isIndividual ? MasterDokumenEnum::groupIndividual() : MasterDokumenEnum::groupCompany();
		$documents = Dokumen::isActive()->whereIn('id', $ids)->get();
		
		$documents->map(function ($document) use (&$rules, $isRequired) {
			$rules['document_' . $document->id] = [
				$document->is_required ? $isRequired : 'nullable',
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
}
