@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h3 class="font-weight-bold">Edit User</h3>
            <p class="text-muted mb-0">Form untuk edit data user</p>
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
                    <form action="{{ route('admin.user.update', $user->no_otor) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nm_user">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nm_user" name="nm_user" value="{{ old('nm_user', $user->nm_user) }}" required>
                            <small class="form-text text-muted">Username untuk login</small>
                        </div>

                        <div class="form-group">
                            <label for="kata_kunci">Password Baru</label>
                            <input type="password" class="form-control" id="kata_kunci" name="kata_kunci">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>

                        <div class="form-group">
                            <label for="no_otor">No Otor</label>
                            <input type="text" class="form-control" id="no_otor" value="{{ $user->no_otor }}" disabled>
                            <small class="form-text text-muted">No Otor tidak dapat diubah</small>
                        </div>

                        <div class="form-group">
                            <label for="role">Role <span class="text-danger">*</span></label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="sales" {{ old('role', $user->role) === 'sales' ? 'selected' : '' }}>Sales</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="ti-save mr-1"></i> Update
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
