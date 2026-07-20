<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class StoreKunjunganRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kd_cust' => 'required|exists:customer,kd_cust',
            'tanggal_kunjungan' => 'required|date',
            'catatan' => 'nullable|string|max:1000'
        ];
    }
}
