<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\StoreKunjunganRequest;
use App\Models\KunjunganSales;
use App\Models\Customer;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungan = KunjunganSales::where('nm_user', session('nmuser'))
            ->with('customer')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('sales.kunjungan.index', compact('kunjungan'));
    }

    public function create()
    {
        $customer = Customer::pluck('nm_cust', 'kd_cust');
        
        return view('sales.kunjungan.create', compact('customer'));
    }

    public function store(StoreKunjunganRequest $request)
    {
        $customer = Customer::where('kd_cust', $request->kd_cust)->first();

        $kunjungan = KunjunganSales::create([
            'nm_user' => session('nmuser'),
            'kd_cust' => $request->kd_cust,
            'nm_cust' => $customer->nm_cust,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'waktu_kunjungan' => now(),
            'catatan' => $request->catatan ?? null,
            'status' => 'kunjungan'
        ]);

        return redirect()->route('sales.kunjungan.index')
            ->with('success', 'Kunjungan berhasil dicatat.');
    }

    public function show($id)
    {
        $kunjungan = KunjunganSales::where('id', $id)
            ->where('nm_user', session('nmuser'))
            ->with('customer')
            ->firstOrFail();
        
        return view('sales.kunjungan.show', compact('kunjungan'));
    }
}
