@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Tambah Customer</h3>
            <p class="text-muted mb-0">Form untuk menambah customer baru.</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="{{ route('customer.index') }}" class="btn btn-light">
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
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Customer Baru</h4>

                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf

                        {{-- Identitas --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kode Customer <span class="text-danger">*</span></label>
                                    <input type="text" name="kd_cust" class="form-control @error('kd_cust') is-invalid @enderror"
                                           value="{{ old('kd_cust') }}" placeholder="Contoh: CST001" maxlength="20" required>
                                    @error('kd_cust')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nama Customer <span class="text-danger">*</span></label>
                                    <input type="text" name="nm_cust" class="form-control @error('nm_cust') is-invalid @enderror"
                                           value="{{ old('nm_cust') }}" placeholder="Nama lengkap customer" maxlength="100" required>
                                    @error('nm_cust')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sales</label>
                                    <input type="text" name="nm_peg" class="form-control @error('nm_peg') is-invalid @enderror"
                                           value="{{ old('nm_peg') }}" placeholder="Nama sales" maxlength="100">
                                    @error('nm_peg')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror"
                                           value="{{ old('kategori') }}" placeholder="Kategori customer" maxlength="50">
                                    @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alm_cust" class="form-control @error('alm_cust') is-invalid @enderror"
                                      rows="2" placeholder="Alamat lengkap">{{ old('alm_cust') }}</textarea>
                            @error('alm_cust')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" name="wilayah" class="form-control @error('wilayah') is-invalid @enderror"
                                   value="{{ old('wilayah') }}" placeholder="Nama kota" maxlength="100">
                            @error('wilayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Kontak --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror"
                                           value="{{ old('telp') }}" placeholder="Nomor telepon" maxlength="20">
                                    @error('telp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telepon 2 <small class="text-muted">(opsional)</small></label>
                                    <input type="text" name="telp2" class="form-control @error('telp2') is-invalid @enderror"
                                           value="{{ old('telp2') }}" placeholder="Nomor telepon 2" maxlength="20">
                                    @error('telp2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>HP</label>
                                    <input type="text" name="hp" class="form-control @error('hp') is-invalid @enderror"
                                           value="{{ old('hp') }}" placeholder="Nomor HP" maxlength="20">
                                    @error('hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="email@contoh.com" maxlength="100">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="ti-save mr-1"></i> Simpan
                            </button>
                            <a href="{{ route('customer.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
