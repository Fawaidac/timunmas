@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h3 class="font-weight-bold">Tambah User</h3>
            <p class="text-muted mb-0">Form untuk menambahkan user baru (Admin atau Sales)</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
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

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nm_user">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nm_user" name="nm_user" value="{{ old('nm_user') }}" required>
                            <small class="form-text text-muted">Username untuk login</small>
                        </div>

                        <div class="form-group">
                            <label for="kata_kunci">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="kata_kunci" name="kata_kunci" required>
                            <small class="form-text text-muted">Minimal 6 karakter</small>
                        </div>

                        <div class="form-group">
                            <label for="no_otor">No Otor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="no_otor" name="no_otor" value="{{ old('no_otor') }}" required>
                            <small class="form-text text-muted">ID unik user</small>
                        </div>

                        <div class="form-group">
                            <label for="role">Role <span class="text-danger">*</span></label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="sales" {{ old('role') === 'sales' ? 'selected' : '' }}>Sales</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            <small class="form-text text-muted">Opsional</small>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="ti-save mr-1"></i> Simpan
                            </button>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-light">
                                <i class="ti-back-left mr-1"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
