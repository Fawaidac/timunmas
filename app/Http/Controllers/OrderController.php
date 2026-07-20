<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\KunjunganSales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of all orders (admin: view only, sales: see own).
     */
    public function index()
    {
        $order = Order::select('no_ent', 'tanggal', 'nm_peg', 'nm_cust', 'alm_cust', 'total')->get();
        return view('listorder', compact('order'));
    }

    /**
     * Show form to create new order (sales only).
     */
    public function tambah2(Request $request)
    {
        $customer = Customer::pluck('nm_cust', 'kd_cust');
        $barang   = Barang::all();
        $selectedCustomer = $request->query('customer');
        $kunjunganId      = $request->query('kunjungan');

        return view('formorder', compact('customer', 'barang', 'selectedCustomer', 'kunjunganId'));
    }

    /**
     * Store a newly created order (sales only).
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'order_date'    => 'required|date',
            'customer_id'   => 'required|exists:customer,kd_cust',
            'product_id'    => 'required|array',
            'product_id.*'  => 'required|exists:barang,kd_brg',
            'qty'           => 'required|array',
            'qty.*'         => 'required|numeric|min:0',
            'price'         => 'required|array',
            'price.*'       => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $orderNo  = 'SO' . time();
            $customer = Customer::where('kd_cust', $request->customer_id)->first();

            $order = Order::create([
                'no_ent'   => $orderNo,
                'tanggal'  => $request->order_date,
                'kd_cust'  => $request->customer_id,
                'nm_cust'  => $customer->nm_cust,
                'alm_cust' => $customer->alm_cust,
                'kd_user'  => session('nmuser'),
                'nm_peg'   => session('nmuser'),
                'total'    => 0,
            ]);

            $grandTotal = 0;

            foreach ($request->product_id as $i => $prodId) {
                $barang   = Barang::where('kd_brg', $prodId)->first();
                $qty      = $request->qty[$i];
                $price    = $request->price[$i];
                $subtotal = $qty * $price;

                OrderDetail::create([
                    'no_ent'   => $orderNo,
                    'kd_brg'   => $prodId,
                    'nm_brg'   => $barang->nm_brg,
                    'qty'      => $qty,
                    'harga'    => $price,
                    'subtotal' => $subtotal,
                ]);

                $grandTotal += $subtotal;
            }

            $order->update(['total' => $grandTotal]);

            if ($request->filled('kunjungan_id')) {
                KunjunganSales::where('id', $request->kunjungan_id)
                    ->where('nm_user', session('nmuser'))
                    ->update([
                        'status'   => 'order_dibuat',
                        'order_no' => $orderNo,
                    ]);
            }

            DB::commit();

            // return redirect('/listorder')->with('success', 'Order berhasil disimpan');
            return redirect()->route('sales.kunjungan.index')
                ->with('success', 'Order berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Gagal menyimpan order: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified order detail.
     */
    public function detail($noent)
    {
        $order   = Order::where('no_ent', $noent)->firstOrFail();
        $details = OrderDetail::where('no_ent', $noent)->get();

        return view('detailorder', compact('order', 'details'));
    }
}
