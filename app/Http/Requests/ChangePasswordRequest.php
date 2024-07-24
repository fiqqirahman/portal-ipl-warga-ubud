<?php

namespace App\Http\Requests;

use App\Rules\PasswordRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
        return [
	        'password' => [
		        'required',
		        'string'
	        ],
	        'password_baru' => [
		        'required',
		        PasswordRule::min(config('secure.APP_SEKURITI_LENGTH_PASS_MIN'))
			        ->mixedCase()
			        ->letters()
			        ->numbers()
			        ->symbols(),
		        'different:password',
		        'string'
	        ],
	        'konfirmasi_password' => [
		        'required',
		        'same:password_baru',
		        'string'
	        ],
        ];
    }
	
	public function attributes(): array
	{
		return [
			'password' => 'Password',
			'password_baru' => 'Password baru',
			'konfirmasi_password' => 'Konfirmasi password baru',
		];
	}
}
