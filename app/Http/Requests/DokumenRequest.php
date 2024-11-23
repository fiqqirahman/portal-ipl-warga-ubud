<?php

namespace App\Http\Requests;

use App\Enums\DocumentAllowedTypesEnum;
use App\Enums\DocumentForEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DokumenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        if (request()->routeIs('master.dokumen.store')) {
            $nama = 'required|max:255|unique:tbl_master_dokumen,nama_dokumen|regex:/^[\pL\s\-]+$/u';
        } else {
            $nama = [
                'required',
                'max:255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('tbl_master_dokumen', 'nama_dokumen')->ignore(
					$this->route('dokumen')->id
                )
            ];
        }

        return [
            'nama_dokumen' => $nama,
            'keterangan' => 'required|max:500',
            'is_required' => 'required|in:1,0',
            'max_file_size' => 'required|numeric|max:99999|min:10',
	        'allowed_file_types' => 'required|array',
	        'allowed_file_types.*' => [
				Rule::in(DocumentAllowedTypesEnum::getAll())
	        ],
	        'for' => [
				'required',
	            Rule::in(DocumentForEnum::getAll())
            ],
        ];
    }
	
	public function attributes(): array
	{
		return [
			'allowed_file_types' => 'Jenis File Diizinkan',
			'allowed_file_types.*' => 'Jenis File Diizinkan'
		];
	}
}
