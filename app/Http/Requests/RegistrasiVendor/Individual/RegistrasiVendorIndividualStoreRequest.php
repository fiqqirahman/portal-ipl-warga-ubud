<?php

namespace App\Http\Requests\RegistrasiVendor\Individual;

use App\Enums\DocumentForEnum;
use App\Services\DocumentService;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrasiVendorIndividualStoreRequest extends FormRequest
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
            'kode_master_kategori_vendor' => [$isRequired,],
            'no_ktp_perorangan' => [$isRequired, 'numeric'],
            'tanggal_berakhir_ktp' => [$isRequired, 'date'],
            'profesi_keahlian' => [$isRequired, 'string', 'max:255'],
	        'confirm_done_checkbox' => ['nullable', Rule::in(['on'])],
	        ...DocumentService::makeValidationRules(DocumentForEnum::Individual, $isRequired),
            ...rulesAlamat(),
            ...rulesBanks(),
            ...rulesSegmentasi(),
        ];
    }
	
	public function attributes(): array
	{
		return [
			'nama' => 'Nama',
			'nama_singkatan' => 'Nama Singkatan',
			'npwp' => 'NPWP',
            'kode_master_kategori_vendor' => 'Kategori Vendor',
            'no_ktp_perorangan' => 'KTP / SIM / Passport',
            'tanggal_berakhir_ktp' => 'Tanggal Berakhir KTP / SIM / Passport',
            'profesi_keahlian' => 'Profesi Keahlian',
            ...DocumentService::makeValidationAttributes(DocumentForEnum::Individual),
            ...attributesAlamat(),
            ...attributesBanks(),
            ...attributesSegmentasi(),
        ];
	}
}
