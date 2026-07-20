@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Tambah Kunjungan Sales</h3>
            <p class="text-muted mb-0">Catat kunjungan ke customer.</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="{{ route('sales.kunjungan.index') }}" class="btn btn-light">
                <i class="ti-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ti-check mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Error!</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Kunjungan</h4>
            <form action="{{ route('sales.kunjungan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Customer <span class="text-danger">*</span></label>
                        <select name="kd_cust" class="form-control" required>
                            <option value="">Pilih Customer</option>
                            @foreach($customer as $kd_cust => $nm_cust)
                                <option value="{{ $kd_cust }}">{{ $kd_cust }} - {{ $nm_cust }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Tanggal Kunjungan <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_kunjungan" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Catatan Kunjungan</label>
                        <textarea name="catatan" class="form-control" rows="4" placeholder="Catatan kondisi toko, request customer, hasil kunjungan, dll..."></textarea>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-save mr-1"></i> Simpan Kunjungan
                    </button>
                    <a href="{{ route('sales.kunjungan.index') }}" class="btn btn-light">
                        <i class="ti-arrow-left mr-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
