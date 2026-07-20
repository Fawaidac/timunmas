@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Manage User</h3>
            <p class="text-muted mb-0">Kelola user admin dan sales</p>
        </div>
        <div class="col-md-4 text-md-right">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                <i class="ti-plus mr-1"></i> Tambah User
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                            <table id="data-table1" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No Otor</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->no_otor }}</td>
                                        <td>{{ $user->nm_user }}</td>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>{{ $user->email ?? '-' }}</td>
                                        <td>
                                            @if($user->role === 'admin')
                                                <span class="badge badge-danger">Admin</span>
                                            @else
                                                <span class="badge badge-info">Sales</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->no_otor) }}" class="btn btn-sm btn-warning">
                                                <i class="ti-pencil"></i> Edit
                                            </a>
                                            @if($user->nm_user !== 'admin')
                                                <form action="{{ route('admin.user.destroy', $user->no_otor) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus user ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="ti-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada user</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
