<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::select('kd_brg', 'nm_brg', 'jns_brg', 'merk', 'satuan1', 'harga_jl', 'stok_a')->get();
        
        return view('listbarang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createbarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        Barang::create($request->validated());
        
        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function detail($kdbrg)
    {
        $data = Barang::where('kd_brg', $kdbrg)->get();
        
        return view('detailbarang', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kdbrg)
    {
        $barang = Barang::where('kd_brg', $kdbrg)->firstOrFail();
        
        return view('editbarang', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, $kdbrg)
    {
        $barang = Barang::where('kd_brg', $kdbrg)->firstOrFail();
        $barang->update($request->validated());
        
        return redirect()->route('barang.detail', $kdbrg)
            ->with('success', 'Barang berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kdbrg)
    {
        $barang = Barang::where('kd_brg', $kdbrg)->firstOrFail();
        $barang->delete();
        
        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
