<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IplPaymentRequest extends FormRequest
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
        if (request()->routeIs('menu.pembayaran-ipl.store')) {
            $amount = 'required';
            $periode = 'required';
            $method = 'required';
            $proof = 'required|mimes:jpg,png,pdf,jpeg|max:5120';
        } elseif (request()->routeIs('menu.pembayaran-ipl.update')) {
            $amount = [
                'required',
            ];
            $method = [
                'required',
            ];
            $proof = [
                'nullable',
                'max:5120',
            ];
            $periode = [
                'required',
            ];
        }

        return [
            'amount' => $amount,
            'method' => $method,
            'proof' => $proof,
            'periode' => $periode,
        ];
    }
}
