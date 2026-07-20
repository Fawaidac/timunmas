<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
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
            'kd_brg' => 'required|string|max:20|unique:barang,kd_brg',
            'nm_brg' => 'required|string|max:150',
            'jns_brg' => 'nullable|string|max:50',
            'merk' => 'nullable|string|max:100',
            'satuan1' => 'nullable|string|max:20',
            'harga_jl' => 'required|numeric|min:0',
            'stok_a' => 'nullable|numeric|min:0'
        ];
    }
}
