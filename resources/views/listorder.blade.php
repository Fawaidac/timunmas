@extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Order Penjualan</h3>
            <p class="text-muted mb-0">Daftar transaksi order penjualan.</p>
        </div>
        @if(session('role') === 'sales')
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a class="btn btn-primary" href="{{ url('tambahorder2') }}">
                <i class="ti-plus mr-1"></i> Tambah Order
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

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="ti-alert mr-1"></i> {{ session('error') }}
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
                        <h4 class="card-title mb-0">Data Order</h4>
                        <span class="badge badge-primary">{{ $order->count() }} order</span>
                    </div>

                    <div class="table-responsive">
                        <table id="data-table1" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No Entry</th>
                                    <th>Tanggal</th>
                                    <th>Sales</th>
                                    <th>Customer</th>
                                    <th>Alamat</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $ord)
                                    <tr>
                                        <td><a class="font-weight-bold text-primary" href="{{ url('detailorder/'.$ord->no_ent) }}">{{ $ord->no_ent }}</a></td>
                                        <td>{{ $ord->tanggal }}</td>
                                        <td>{{ $ord->nm_peg }}</td>
                                        <td>{{ $ord->nm_cust }}</td>
                                        <td>{{ $ord->alm_cust }}</td>
                                        <td class="text-right font-weight-bold">{{ number_format((float) $ord->total, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Entry</th>
                                    <th>Tanggal</th>
                                    <th>Sales</th>
                                    <th>Customer</th>
                                    <th>Alamat</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
