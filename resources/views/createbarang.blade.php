@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Tambah Barang</h3>
            <p class="text-muted mb-0">Form untuk menambah barang baru.</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="{{ route('barang.index') }}" class="btn btn-light">
                <i class="ti-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Ada kesalahan input:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Barang Baru</h4>
                    
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="kd_brg">Kode Barang <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kd_brg') is-invalid @enderror" 
                                   id="kd_brg" name="kd_brg" value="{{ old('kd_brg') }}" 
                                   placeholder="Contoh: BRG001" required maxlength="20">
                            @error('kd_brg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nm_brg">Nama Barang <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nm_brg') is-invalid @enderror" 
                                   id="nm_brg" name="nm_brg" value="{{ old('nm_brg') }}" 
                                   placeholder="Nama barang" required maxlength="150">
                            @error('nm_brg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jns_brg">Kategori</label>
                                    <input type="text" class="form-control @error('jns_brg') is-invalid @enderror" 
                                           id="jns_brg" name="jns_brg" value="{{ old('jns_brg') }}" 
                                           placeholder="Kategori barang" maxlength="50">
                                    @error('jns_brg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <input type="text" class="form-control @error('merk') is-invalid @enderror" 
                                           id="merk" name="merk" value="{{ old('merk') }}" 
                                           placeholder="Merk barang" maxlength="100">
                                    @error('merk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="satuan1">Satuan</label>
                                    <input type="text" class="form-control @error('satuan1') is-invalid @enderror" 
                                           id="satuan1" name="satuan1" value="{{ old('satuan1') }}" 
                                           placeholder="Contoh: PCS" maxlength="20">
                                    @error('satuan1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="harga_jl">Harga Jual <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('harga_jl') is-invalid @enderror" 
                                           id="harga_jl" name="harga_jl" value="{{ old('harga_jl', 0) }}" 
                                           placeholder="0" step="0.01" min="0" required>
                                    @error('harga_jl')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stok_a">Stok Awal</label>
                                    <input type="number" class="form-control @error('stok_a') is-invalid @enderror" 
                                           id="stok_a" name="stok_a" value="{{ old('stok_a', 0) }}" 
                                           placeholder="0" step="0.01" min="0">
                                    @error('stok_a')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="ti-save mr-1"></i> Simpan
                            </button>
                            <a href="{{ route('barang.index') }}" class="btn btn-light">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
