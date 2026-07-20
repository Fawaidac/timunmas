<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Checkin;
use App\Models\Customer;
use App\Models\KunjunganSales;
use App\Models\Order;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $barang = Barang::all();
        $customer = Customer::all();
        $order = Order::all();

        if (session('role') === 'sales') {
            $kunjungan = KunjunganSales::where('nm_user', session('nmuser'))->latest()->limit(5)->get();
            $pembayaranPending = Pembayaran::where('nm_user', session('nmuser'))->where('status', 'pending')->count();
            $checkinHariIni = Checkin::where('nm_user', session('nmuser'))->whereDate('waktu_checkin', today())->count();

            return view('dashboard-sales', compact('barang', 'customer', 'order', 'kunjungan', 'pembayaranPending', 'checkinHariIni'));
        }
        
        return view('dashboard', compact('barang', 'customer', 'order'));
    }
}
