<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RejectPembayaranRequest;
use App\Models\Pembayaran;

class PembayaranApprovalController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::orderBy('created_at', 'desc')->get();
        $pendingCount = Pembayaran::where('status', 'pending')->count();
        
        return view('admin.pembayaran-approval.index', compact('pembayaran', 'pendingCount'));
    }

    public function approve($id)
    {
        $pembayaran = Pembayaran::where('status', 'pending')->findOrFail($id);
        
        $pembayaran->update([
            'status' => 'approved',
            'approved_by' => session('nmuser'),
            'approved_at' => now()
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil disetujui dan status menjadi LUNAS');
    }

    public function reject(RejectPembayaranRequest $request, $id)
    {
        $pembayaran = Pembayaran::where('status', 'pending')->findOrFail($id);
        
        $pembayaran->update([
            'status' => 'rejected',
            'approved_by' => session('nmuser'),
            'approved_at' => now(),
            'reject_reason' => $request->reject_reason
        ]);

        return redirect()->back()->with('success', 'Pembayaran ditolak dan dikembalikan ke Sales untuk revisi');
    }
}
