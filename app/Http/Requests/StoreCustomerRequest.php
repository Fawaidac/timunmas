<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'kd_cust' => 'required|string|max:20|unique:customer,kd_cust',
            'nm_cust' => 'required|string|max:100',
            'nm_peg' => 'nullable|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'alm_cust' => 'nullable|string',
            'wilayah' => 'nullable|string|max:100',
            'telp' => 'nullable|string|max:20',
            'telp2' => 'nullable|string|max:20',
            'hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100'
        ];
    }
}
