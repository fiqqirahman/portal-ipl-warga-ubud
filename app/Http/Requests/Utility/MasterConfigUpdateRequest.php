<?php

namespace App\Http\Requests\Utility;

use Illuminate\Foundation\Http\FormRequest;

class MasterConfigUpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(): array
	{
		return [
			'value' => 'required|string|max:650000',
			'description' => 'required|string|max:2000'
		];
	}
	
	public function attributes(): array
	{
		return [
			'description' => 'Keterangan'
		];
	}
}
