<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\StoreCheckinRequest;
use App\Models\Checkin;
use App\Models\Customer;

class CheckinController extends Controller
{
    public function index()
    {
        $checkins = Checkin::where('nm_user', session('nmuser'))
            ->with('customer')
            ->orderBy('waktu_checkin', 'desc')
            ->get();
        
        return view('sales.checkin.index', compact('checkins'));
    }

    public function create()
    {
        $customer = Customer::pluck('nm_cust', 'kd_cust');
        
        return view('sales.checkin.create', compact('customer'));
    }

    public function store(StoreCheckinRequest $request)
    {
        $customer = Customer::where('kd_cust', $request->kd_cust)->first();

        Checkin::create([
            'nm_user' => session('nmuser'),
            'kd_cust' => $request->kd_cust,
            'nm_cust' => $customer->nm_cust,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat_lengkap' => $customer->alm_cust,
            'waktu_checkin' => now(),
            'catatan' => $request->catatan
        ]);

        return redirect()->route('sales.checkin.index')
            ->with('success', 'Check-in berhasil');
    }
}
