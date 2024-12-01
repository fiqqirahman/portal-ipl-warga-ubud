<?php

namespace App\Http\Requests\RegistrasiVendor\Operator;

use App\Enums\StatusRegistrasiEnum;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApprovalRequest extends FormRequest
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
		return [
			'status_registrasi' => ['required', 'string', Rule::in(
				[
					StatusRegistrasiEnum::VerificationDocuments->value,
					StatusRegistrasiEnum::RevisionDocuments->value,
					StatusRegistrasiEnum::Approved->value,
					StatusRegistrasiEnum::Rejected->value,
				]
			)],
			'appointment_date' => ['nullable', 'string', 'date_format:Y-m-d H:i', Rule::requiredIf(function () {
				return $this->input('status_registrasi') == StatusRegistrasiEnum::VerificationDocuments->value;
			})],
			'status_registrasi_notes' => ['nullable', 'string', 'max:3000'],
		];
	}
	
	public function attributes(): array
	{
		return [
			'status_registrasi' => 'Status Registrasi',
			'appointment_date' => 'Janji Bertemu',
			'status_registrasi_notes' => 'Catatan'
		];
	}
}
