@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Detail Barang</h3>
            <p class="text-muted mb-0">Informasi produk, satuan, harga, dan stok.</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            @if(session('role') === 'admin')
            <a href="{{ route('barang.edit', $data->first()->kd_brg) }}" class="btn btn-warning mr-2">
                <i class="ti-pencil mr-1"></i> Edit
            </a>
            <form action="{{ route('barang.destroy', $data->first()->kd_brg) }}" method="POST" class="d-inline" 
                    onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="ti-trash mr-1"></i> Hapus
                </button>
            </form>
            @endif
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

    @foreach($data as $brg)
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $brg->nm_brg }}</h4>
                        <p class="text-muted">Kode: {{ $brg->kd_brg }}</p>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Kategori</label>
                                <input type="text" class="form-control" value="{{ $brg->jns_brg }}" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Merk</label>
                                <input type="text" class="form-control" value="{{ $brg->merk }}" readonly>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" value="{{ $brg->nm_brg }}" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Satuan 1</label>
                                <input type="text" class="form-control" value="{{ $brg->satuan1 }}" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Satuan 2</label>
                                <input type="text" class="form-control" value="{{ $brg->satuan2 }} = {{ number_format($brg->kapasitas2, 0, ',', '.') }} {{ $brg->sat_tur2 }}" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Satuan 3</label>
                                <input type="text" class="form-control" value="{{ $brg->satuan3 }} = {{ number_format($brg->kapasitas3, 0, ',', '.') }} {{ $brg->sat_tur3 }}" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Satuan 4</label>
                                <input type="text" class="form-control" value="{{ $brg->satuan4 }} = {{ number_format($brg->kapasitas4, 0, ',', '.') }} {{ $brg->sat_tur4 }}" readonly>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Stok Saat Ini</label>
                                <input type="text" class="form-control font-weight-bold" value="{{ number_format($brg->stok_a, 2, ',', '.') }} {{ $brg->satuan1 }}" readonly>
                            </div>

                            @if (Session::get('nootor') == 10)
                                <div class="col-md-6 form-group">
                                    <label>HPP</label>
                                    <input type="text" class="form-control" value="{{ number_format($brg->hpP, 2, ',', '.') }}" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Harga Beli</label>
                                    <input type="text" class="form-control" value="{{ number_format($brg->harga_bl, 2, ',', '.') }}" readonly>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Supplier</label>
                                    <input type="text" class="form-control" value="{{ $brg->nm_suppl }}" readonly>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Harga Penjualan</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th class="text-right">Harga Jual</th>
                                        @if (Session::get('nootor') == 10)
                                            <th class="text-right">% Harga</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach([
                                        [$brg->harga_jl, $brg->pros_harga],
                                        [$brg->harga_jl2, $brg->sak_b],
                                        [$brg->harga_jl3, $brg->sak_c],
                                        [$brg->harga_jl4, $brg->sak_d],
                                        [$brg->harga_jl5, $brg->sak_e],
                                    ] as $idx => $harga)
                                        <tr>
                                            <td>{{ $idx + 1 }}</td>
                                            <td class="text-right font-weight-bold">{{ number_format($harga[0], 2, ',', '.') }}</td>
                                            @if (Session::get('nootor') == 10)
                                                <td class="text-right">{{ number_format($harga[1], 2, ',', '.') }}%</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
