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
	        
            'daftar_komisaris' => 'required|array',
	        'daftar_komisaris.*.no_identitas_komisaris' => 'required|string|max:255',
	        'daftar_komisaris.*.kode_master_jenis_identitas_komisaris' => 'required|string|max:255',
	        'daftar_komisaris.*.nama_komisaris' => 'required|string|max:255',
	        'daftar_komisaris.*.alamat_komisaris' => 'required|string|max:255',
	        'daftar_komisaris.*.kode_master_jabatan_vendor_komisaris' => 'required|string|max:255',
	        'daftar_komisaris.*.tanggal_lahir_komisaris' => 'required|date',
        ];
    }
	
	public function attributes(): array
	{
		return [
			'nama' => 'Nama',
			'nama_singkatan' => 'Nama Singkatan',
			'npwp' => 'NPWP',
			
			...DocumentService::makeValidationAttributes(DocumentForEnum::Company),
			
			'daftar_komisaris' => 'Daftar Komisaris',
			'daftar_komisaris.*.no_identitas_komisaris' => 'Nomor Identitas Komisaris',
			'daftar_komisaris.*.kode_master_jenis_identitas_komisaris' => 'Jenis Identitas Komisaris',
			'daftar_komisaris.*.nama_komisaris' => 'Nama Komisaris',
			'daftar_komisaris.*.alamat_komisaris' => 'Alamat Komisaris',
			'daftar_komisaris.*.kode_master_jabatan_vendor_komisaris' => 'Jabatan Komisaris',
			'daftar_komisaris.*.tanggal_lahir_komisaris' => 'Tanggal Lahir Komisaris',
		];
	}
}
