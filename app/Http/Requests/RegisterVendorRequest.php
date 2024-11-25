<?php

namespace App\Http\Requests;

use App\Enums\UserVendorTypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterVendorRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users,email|max:100',
            'password' => 'required|string|min:8|confirmed',
            'name' => 'required|string|max:255',
            'password_confirmation' => 'required|string',
	        'vendor_type' => ['required', Rule::in([UserVendorTypeEnum::Company, UserVendorTypeEnum::Individual])],
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'email' => 'Email',
            'password' => 'Password baru',
            'password_confirmation' => 'Konfirmasi password baru',
        ];
    }
}
