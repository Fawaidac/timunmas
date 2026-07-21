@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Dashboard Sales</h3>
            <p class="text-muted mb-0">Alur kerja sales: kunjungan, SO, penagihan, cek barang, dan check-in.</p>
        </div>
        <div class="col-md-4 text-md-right">
            <span class="badge badge-primary">{{ session('nmuser') }}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <p class="mb-4">Kunjungan</p>
                    <p class="fs-30 mb-2">{{ $kunjungan->count() }}</p>
                    <a href="{{ route('sales.kunjungan.index') }}" class="btn btn-light btn-sm mt-3">Buka</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <p class="mb-4">Pending Approval</p>
                    <p class="fs-30 mb-2">{{ $pembayaranPending }}</p>
                    <a href="{{ route('sales.pembayaran.index') }}" class="btn btn-light btn-sm mt-3">Penagihan</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <p class="mb-4">Check-in Hari Ini</p>
                    <p class="fs-30 mb-2">{{ $checkinHariIni }}</p>
                    <a href="{{ route('sales.checkin.create') }}" class="btn btn-light btn-sm mt-3">Check-in</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <p class="mb-4">Barang</p>
                    <p class="fs-30 mb-2">{{ $barang->count() }}</p>
                    <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm mt-3">Cek Barang</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Navigasi Cepat Sales</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><i class="icon-map text-primary mr-2"></i> Kunjungan Sales</td>
                                    <td class="text-right"><a href="{{ route('sales.kunjungan.create') }}" class="btn btn-outline-primary btn-sm">Pilih Customer</a></td>
                                </tr>
                                <tr>
                                    <td><i class="icon-bag text-primary mr-2"></i> Buat Sales Order</td>
                                    <td class="text-right"><a href="{{ route('order.tambah2') }}" class="btn btn-outline-primary btn-sm">Buat SO</a></td>
                                </tr>
                                <tr>
                                    <td><i class="icon-paper text-primary mr-2"></i> Penagihan</td>
                                    <td class="text-right"><a href="{{ route('sales.pembayaran.create') }}" class="btn btn-outline-primary btn-sm">Input Bayar</a></td>
                                </tr>
                                <tr>
                                    <td><i class="icon-location text-primary mr-2"></i> Titik Poin</td>
                                    <td class="text-right"><a href="{{ route('sales.checkin.create') }}" class="btn btn-outline-primary btn-sm">Check-in</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kunjungan Terakhir</h4>
                    @forelse($kunjungan as $row)
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <div>
                                <strong>{{ $row->nm_cust }}</strong><br>
                                <small class="text-muted">{{ $row->tanggal_kunjungan->format('d/m/Y') }}</small>
                            </div>
                            <a href="{{ route('sales.kunjungan.show', $row->id) }}" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center">Detail</a>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Belum ada kunjungan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
