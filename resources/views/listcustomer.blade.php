@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Master Customer</h3>
            <p class="text-muted mb-0">Daftar pelanggan dan informasi kontak.</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="{{ route('customer.create') }}" class="btn btn-primary">
                <i class="ti-plus mr-1"></i> Tambah Customer
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

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">Data Customer</h4>
                        <span class="badge badge-success">{{ $data->count() }} customer</span>
                    </div>

                    <div class="table-responsive">
                        <table id="data-table1" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Customer</th>
                                    <th>Nama Customer</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Kota</th>
                                    <th>Telepon</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $cust)
                                    <tr>
                                        <td><a class="font-weight-bold text-primary" href="{{ url('detailcustomer/'.$cust->kd_cust) }}">{{ $cust->kd_cust }}</a></td>
                                        <td><a class="text-dark" href="{{ url('detailcustomer/'.$cust->kd_cust) }}">{{ $cust->nm_cust }}</a></td>
                                        <td>{{ $cust->alm_cust }}</td>
                                        <td>{{ $cust->wilayah }}</td>
                                        <td>{{ $cust->telp }}</td>
                                        <td><span class="badge badge-outline-primary">{{ $cust->kategori }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode Customer</th>
                                    <th>Nama Customer</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Kota</th>
                                    <th>Telepon</th>
                                    <th>Kategori</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
