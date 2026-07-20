@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Detail Order</h3>
            <p class="text-muted mb-0">Informasi lengkap order penjualan.</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="{{ url()->previous() ?? route('dashboard') }}" class="btn btn-light">
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

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $order->no_ent }}</h4>
                    <p class="text-muted">Tanggal: {{ $order->tanggal }}</p>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Customer</label>
                            <input type="text" class="form-control" value="{{ $order->nm_cust }}" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Sales</label>
                            <input type="text" class="form-control" value="{{ $order->nm_peg }}" readonly>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" value="{{ $order->alm_cust }}" readonly>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3">Detail Barang</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th class="text-right">Qty</th>
                                    <th class="text-right">Harga</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $idx => $det)
                                    <tr>
                                        <td>{{ $idx + 1 }}</td>
                                        <td>{{ $det->kd_brg }}</td>
                                        <td>{{ $det->nm_brg }}</td>
                                        <td class="text-right">{{ number_format($det->qty, 2, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($det->harga, 2, ',', '.') }}</td>
                                        <td class="text-right font-weight-bold">{{ number_format($det->subtotal, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" class="text-right">Grand Total:</th>
                                    <th class="text-right">{{ number_format($order->total, 2, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
