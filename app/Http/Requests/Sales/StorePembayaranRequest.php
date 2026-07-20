<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class StorePembayaranRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kd_cust' => 'required|exists:customer,kd_cust',
            'no_faktur' => 'required|exists:mst_ord_jual,no_ent',
            'nominal' => 'required|numeric|min:1',
            'metode_bayar' => 'required|in:cash,transfer',
            'keterangan' => 'nullable|string|max:1000'
        ];
    }
}
