<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\StorePembayaranRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::where('nm_user', session('nmuser'))
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('sales.pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $customer = Customer::pluck('nm_cust', 'kd_cust');
        $faktur = Order::select('no_ent', 'tanggal', 'kd_cust', 'nm_cust', 'total')
            ->orderBy('tanggal', 'desc')
            ->get();
        
        return view('sales.pembayaran.create', compact('customer', 'faktur'));
    }

    public function store(StorePembayaranRequest $request)
    {
        $customer = Customer::where('kd_cust', $request->kd_cust)->first();

        Pembayaran::create([
            'no_bayar' => 'PAY' . time(),
            'nm_user' => session('nmuser'),
            'kd_cust' => $request->kd_cust,
            'nm_cust' => $customer->nm_cust,
            'no_faktur' => $request->no_faktur,
            'nominal' => $request->nominal,
            'metode_bayar' => $request->metode_bayar,
            'keterangan' => $request->keterangan,
            'status' => 'pending'
        ]);

        return redirect()->route('sales.pembayaran.index')
            ->with('success', 'Pembayaran berhasil disimpan dan menunggu approval admin');
    }
}
