@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Detail Kunjungan</h3>
            <p class="text-muted mb-0">Informasi lengkap kunjungan sales ke customer</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="{{ route('sales.kunjungan.index') }}" class="btn btn-light">
                <i class="ti-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $kunjungan->nm_cust }}</h4>
                    <p class="text-muted">Kode Customer: {{ $kunjungan->kd_cust }}</p>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Kode Customer</label>
                            <input type="text" class="form-control" value="{{ $kunjungan->kd_cust }}" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Nama Customer</label>
                            <input type="text" class="form-control" value="{{ $kunjungan->nm_cust }}" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tanggal Kunjungan</label>
                            <input type="text" class="form-control" value="{{ $kunjungan->tanggal_kunjungan->format('d/m/Y') }}" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Waktu Kunjungan</label>
                            <input type="text" class="form-control" value="{{ $kunjungan->waktu_kunjungan }}" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Sales</label>
                            <input type="text" class="form-control" value="{{ $kunjungan->nm_user }}" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Status</label>
                            <input type="text" class="form-control font-weight-bold" value="{{ str_replace('_', ' ', strtoupper($kunjungan->status)) }}" readonly>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Catatan</label>
                            <textarea class="form-control" rows="3" readonly>{{ $kunjungan->catatan ?? '-' }}</textarea>
                        </div>

                        @if($kunjungan->order_no)
                        <div class="col-md-12 form-group">
                            <label>Nomor Order</label>
                            <input type="text" class="form-control font-weight-bold text-success" value="{{ $kunjungan->order_no }}" readonly>
                        </div>
                        @endif
                    </div>

                    <div class="mt-3">
                        @if($kunjungan->status === 'kunjungan')
                        <a href="{{ route('order.tambah2') }}?customer={{ $kunjungan->kd_cust }}&kunjungan={{ $kunjungan->id }}" class="btn btn-success">
                            <i class="ti-shopping-cart mr-1"></i> Buat Sales Order (SO)
                        </a>
                        @endif
                        
                        <a href="{{ route('sales.kunjungan.index') }}" class="btn btn-light">
                            <i class="ti-arrow-left mr-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informasi</h4>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="ti-calendar text-primary mr-3"></i>
                        <div>
                            <small class="text-muted">Tanggal</small>
                            <p class="mb-0 font-weight-bold">{{ $kunjungan->tanggal_kunjungan->format('d F Y') }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="ti-time text-info mr-3 "></i>
                        <div>
                            <small class="text-muted">Waktu</small>
                            <p class="mb-0 font-weight-bold">{{ $kunjungan->waktu_kunjungan }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="ti-user text-warning mr-3 "></i>
                        <div>
                            <small class="text-muted">Sales</small>
                            <p class="mb-0 font-weight-bold">{{ $kunjungan->nm_user }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <i class="ti-flag text-success mr-3 "></i>
                        <div>
                            <small class="text-muted">Status</small>
                            <p class="mb-0 font-weight-bold">
                                @if($kunjungan->status === 'belum_order')
                                    <span class="badge badge-warning">Belum Order</span>
                                @elseif($kunjungan->status === 'order_dibuat')
                                    <span class="badge badge-success">Order Dibuat</span>
                                @else
                                    <span class="badge badge-secondary">{{ ucfirst($kunjungan->status) }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
