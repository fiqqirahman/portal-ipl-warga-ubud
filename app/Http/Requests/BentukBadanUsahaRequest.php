<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BentukBadanUsahaRequest extends FormRequest
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
        if (request()->routeIs('master.bentuk-badan-usaha.store')) {
            $nama = 'required|max:255|unique:tbl_master_bentuk_badan_usaha,nama|regex:/^[\pL\s\-]+$/u';
            $kode = 'required|max:255|unique:tbl_master_bentuk_badan_usaha,kode';
        } elseif (request()->routeIs('master.bentuk-badan-usaha.update')) {
            $nama = [
                'required',
                'max:255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('tbl_master_bentuk_badan_usaha', 'nama')->ignore(dekrip($this->id))
            ];
            $kode = [
                'sometimes',
                'between:1,100000',
                Rule::unique('tbl_master_bentuk_badan_usaha', 'kode')->ignore(dekrip($this->id))
            ];
        }

        return [
            'nama' => $nama,
            'kode' => $kode,
            'keterangan' => 'required'
        ];
    }
}
