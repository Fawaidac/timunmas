<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::select('kd_cust', 'nm_cust', 'nm_peg', 'kategori', 'alm_cust', 'wilayah', 'telp', 'telp2', 'hp', 'email')->get();
        
        return view('listcustomer', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createcustomer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->validated());
        
        return redirect()->route('customer.index')
            ->with('success', 'Customer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function detail($kdcust)
    {
        $data = Customer::where('kd_cust', $kdcust)->get();
        
        return view('detailcustomer', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kdcust)
    {
        $customer = Customer::where('kd_cust', $kdcust)->firstOrFail();
        
        return view('editcustomer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, $kdcust)
    {
        $customer = Customer::where('kd_cust', $kdcust)->firstOrFail();
        $customer->update($request->validated());
        
        return redirect()->route('customer.detail', $kdcust)
            ->with('success', 'Customer berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kdcust)
    {
        $customer = Customer::where('kd_cust', $kdcust)->firstOrFail();
        $customer->delete();
        
        return redirect()->route('customer.index')
            ->with('success', 'Customer berhasil dihapus.');
    }
}
