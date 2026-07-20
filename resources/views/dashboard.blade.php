@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Dashboard Timun Mas</h3>
                    <h6 class="font-weight-normal mb-0">Ringkasan data master dan transaksi penjualan.</h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white" type="button">
                                <i class="mdi mdi-calendar"></i> {{ now()->translatedFormat('d F Y') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <p class="mb-4">Barang Terdaftar</p>
                    <p class="fs-30 mb-2">{{ $barang->count() }}</p>
                    <p>Master produk aktif</p>
                    <a href="{{ url('listbarang') }}" class="btn btn-light btn-sm mt-3">Lihat Barang</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <p class="mb-4">Customer</p>
                    <p class="fs-30 mb-2">{{ $customer->count() }}</p>
                    <p>Data pelanggan</p>
                    <a href="{{ url('listcustomer') }}" class="btn btn-light btn-sm mt-3">Lihat Customer</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <p class="mb-4">Daftar Order</p>
                    <p class="fs-30 mb-2">{{ $order->count() }}</p>
                    <p>Transaksi penjualan</p>
                    <a href="{{ url('listorder') }}" class="btn btn-light btn-sm mt-3">Lihat Order</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Navigasi Cepat</p>
                    <div class="table-responsive mt-3">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><i class="icon-tag text-primary mr-2"></i> Master Barang</td>
                                    <td class="text-right"><a href="{{ url('listbarang') }}" class="btn btn-outline-primary btn-sm">Buka</a></td>
                                </tr>
                                <tr>
                                    <td><i class="icon-head text-success mr-2"></i> Master Customer</td>
                                    <td class="text-right"><a href="{{ url('listcustomer') }}" class="btn btn-outline-success btn-sm">Buka</a></td>
                                </tr>
                                <tr>
                                    <td><i class="icon-bag text-info mr-2"></i> Order Penjualan</td>
                                    <td class="text-right"><a href="{{ url('listorder') }}" class="btn btn-outline-info btn-sm">Buka</a></td>
                                </tr>
                                <tr>
                                    <td><i class="icon-check text-warning mr-2"></i> Approval Pembayaran</td>
                                    <td class="text-right"><a href="{{ route('admin.pembayaran.index') }}" class="btn btn-outline-warning btn-sm">Buka</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Status Sistem</h4>
                    <p class="text-muted">Laravel 10 + MySQL</p>
                    <div class="d-flex align-items-center mb-3">
                        <i class="ti-check-box text-success mr-3"></i>
                        <span>Login session aktif: <strong>{{ session('nmuser') }}</strong></span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="ti-server text-primary mr-3"></i>
                        <span>Database MySQL terhubung</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="ti-layout text-info mr-3"></i>
                        <span>Tampilan Skydash aktif</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
