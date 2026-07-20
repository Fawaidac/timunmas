@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Master Barang</h3>
            <p class="text-muted mb-0">Daftar barang, harga jual, dan stok tersedia.</p>
        </div>
        @if(session('role') === 'admin')
            <div class="col-md-4 text-md-right mt-3 mt-md-0">
                <a href="{{ route('barang.create') }}" class="btn btn-primary">
                    <i class="ti-plus mr-1"></i> Tambah Barang
                </a>
            </div>
        @endif
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
                        <h4 class="card-title mb-0">Data Barang</h4>
                        <span class="badge badge-primary">{{ $barang->count() }} item</span>
                    </div>

                    <div class="table-responsive">
                        <table id="data-table1" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    @if (Session::get('nootor') == 10)
                                        <th class="text-right">Harga Dasar</th>
                                    @endif
                                    <th class="text-right">Harga Jual</th>
                                    <th class="text-right">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $brg)
                                    <tr>
                                        <td><a class="font-weight-bold text-primary" href="{{ url('detailbarang/'.$brg->kd_brg) }}">{{ $brg->kd_brg }}</a></td>
                                        <td><a class="text-dark" href="{{ url('detailbarang/'.$brg->kd_brg) }}">{{ $brg->nm_brg }}</a></td>
                                        <td><span class="badge badge-outline-secondary">{{ $brg->satuan1 }}</span></td>
                                        @if (Session::get('nootor') == 10)
                                            <td class="text-right">{{ number_format($brg->harga_bl, 2, ',', '.') }}</td>
                                        @endif
                                        <td class="text-right font-weight-bold">{{ number_format($brg->harga_jl, 2, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($brg->stok_a, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    @if (Session::get('nootor') == 10)
                                        <th class="text-right">Harga Dasar</th>
                                    @endif
                                    <th class="text-right">Harga Jual</th>
                                    <th class="text-right">Stok</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
