<?php

namespace App\Http\Requests\RegistrasiVendor\Company;

use App\Enums\DocumentForEnum;
use App\Services\DocumentService;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrasiVendorCompanyStoreRequest extends FormRequest
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
	 * @throws Exception
	 */
    public function rules(): array
    {
	    if($this->query('tab')){
		    session()->flash('last_opened_tab', $this->query('tab'));
	    }
		
		$isRequired = $this->input('confirm_done_checkbox') === 'on' ? 'required' : 'nullable';
		
        return [
			'nama' => [$isRequired, 'string', 'max:255'],
			'nama_singkatan' => [$isRequired, 'string', 'max:255'],
			'npwp' => [$isRequired, 'numeric', 'digits_between:15,16'],
	        'confirm_done_checkbox' => ['nullable', Rule::in(['on'])],
	        ...DocumentService::makeValidationRules(DocumentForEnum::Company, $isRequired),
	        ...rulesDaftarKomisaris(),
	        ...rulesDaftarDireksi(),
	        ...rulesPemegangSaham(),
        ];
    }
	
	public function attributes(): array
	{
		return [
			'nama' => 'Nama',
			'nama_singkatan' => 'Nama Singkatan',
			'npwp' => 'NPWP',
			...DocumentService::makeValidationAttributes(DocumentForEnum::Company),
			...attributesDaftarKomisaris(),
			...attributesDaftarDireksi(),
			...attributesPemegangSaham()
		];
	}
}
