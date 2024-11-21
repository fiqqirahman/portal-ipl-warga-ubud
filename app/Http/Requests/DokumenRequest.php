<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DokumenRequest extends FormRequest
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
        if (request()->routeIs('master.dokumen.store')) {
            $nama = 'required|max:255|unique:tbl_master_dokumen,nama_dokumen|regex:/^[\pL\s\-]+$/u';
        } elseif (request()->routeIs('master.dokumen.update')) {
            $nama = [
                'required',
                'max:255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('tbl_master_dokumen', 'nama_dokumen')->ignore(dekrip($this->id))
            ];
        }

        return [
            'nama_dokumen' => $nama,
            'keterangan' => 'required',
            'is_required' => 'required',
            'max_file_size' => 'required|max:5120',
            'allowed_file_types' => 'required'
        ];
    }
}
