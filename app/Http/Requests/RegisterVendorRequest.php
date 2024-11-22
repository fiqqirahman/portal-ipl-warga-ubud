<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users,email|max:100',
            'password' => 'required|string|min:8|confirmed',
            'name' => 'required|string|max:255',
            'password_confirmation' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password baru',
            'password_confirmation' => 'Konfirmasi password baru',
        ];
    }
}
