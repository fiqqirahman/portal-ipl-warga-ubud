<?php

namespace App\Http\Requests\RegistrasiVendor\Company;

use App\Enums\DocumentForEnum;
use App\Services\DocumentService;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrasiVendorCompanyUpdateRequest extends FormRequest
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
		
		$registrasiVendor = $this->route('registrasi_vendor');
		
        return [
			'nama' => [$isRequired, 'string', 'max:255'],
			'npwp' => [$isRequired, 'numeric', 'digits_between:15,16'],
			'kode_master_kategori_vendor' => [$isRequired, 'string'],
			'kode_master_jenis_vendor' => [$isRequired, 'string'],
			'kode_master_bentuk_badan_usaha' => [$isRequired, 'string'],
			'kode_master_status_perusahaan' => [$isRequired, 'string'],
	        'confirm_done_checkbox' => ['nullable', Rule::in(['on'])],
	        ...DocumentService::makeValidationRules(DocumentForEnum::Company, $isRequired, $registrasiVendor),
	        ...rulesDaftarKomisaris(),
	        ...rulesDaftarDireksi(),
	        ...rulesPemegangSaham(),
	        ...rulesTenagaAhli(),
	        ...rulesInventaris(),
	        ...rulesNeracaKeuangan(),
	        ...rulesAlamat(),
	        ...rulesContactPersons(),
	        ...rulesBanks(),
	        ...rulesSegmentasi(),
            ...rulesPengalaman3TahunTerakhir(),
	        ...rulesPengalamanMitraUsaha(),
	        ...rulesPengalamanPekerjaanBerjalan(),
        ];
    }
	
	public function attributes(): array
	{
		return [
			'nama' => 'Nama',
			'npwp' => 'NPWP',
			'kode_master_kategori_vendor' => 'Kategori Vendor',
			'kode_master_jenis_vendor' => 'Jenis Vendor',
			'kode_master_bentuk_badan_usaha' => 'Bentuk Badan Usaha',
			'kode_master_status_perusahaan' => 'Status Perusahaan',
			...DocumentService::makeValidationAttributes(DocumentForEnum::Company),
			...attributesDaftarKomisaris(),
			...attributesDaftarDireksi(),
			...attributesPemegangSaham(),
			...attributesTenagaAhli(),
			...attributesInventaris(),
			...attributesNeracaKeuangan(),
			...attributesAlamat(),
			...attributesContactPersons(),
			...attributesBanks(),
			...attributesSegmentasi(),
			...attributesPengalaman3TahunTerakhir(),
			...attributesPengalamanMitraUsaha(),
			...attributesPengalamanPekerjaanBerjalan(),
		];
	}
}
