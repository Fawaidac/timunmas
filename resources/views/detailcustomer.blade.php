@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Detail Customer</h3>
            <p class="text-muted mb-0">Informasi lengkap pelanggan.</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="{{ route('customer.edit', $data->first()->kd_cust) }}" class="btn btn-warning mr-2">
                <i class="ti-pencil mr-1"></i> Edit
            </a>
            <form action="{{ route('customer.destroy', $data->first()->kd_cust) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Yakin ingin menghapus customer ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="ti-trash mr-1"></i> Hapus
                </button>
            </form>
            <a href="{{ url()->previous() }}" class="btn btn-light ml-2">
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

    @foreach($data as $cust)
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $cust->nm_cust }}</h4>
                        <p class="text-muted">Kode: {{ $cust->kd_cust }}</p>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Sales</label>
                                <input type="text" class="form-control" value="{{ $cust->nm_peg }}" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Kategori</label>
                                <input type="text" class="form-control" value="{{ $cust->kategori }}" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control" value="{{ $cust->kd_cust }}" readonly>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{ $cust->nm_cust }}" readonly>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" value="{{ $cust->alm_cust }}" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Kota</label>
                                <input type="text" class="form-control" value="{{ $cust->wilayah }}" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Telepon</label>
                                <input type="text" class="form-control" value="{{ $cust->telp1 }}" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Telepon 2</label>
                                <input type="text" class="form-control" value="{{ $cust->telp2 }}" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>HP</label>
                                <input type="text" class="form-control" value="{{ $cust->hp }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
