@extends('layouts.template')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="font-weight-bold">Kunjungan Sales</h3>
        <p class="text-muted mb-0">Daftar kunjungan toko/customer.</p>
    </div>
    <div class="col-md-4 text-md-right">
        <a href="{{ route('sales.kunjungan.create') }}" class="btn btn-primary">Tambah Kunjungan</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
                <table id="data-table1" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kunjungan as $row)
                        <tr>
                            <td>{{ $row->tanggal_kunjungan->format('d/m/Y') }}</td>
                            <td>{{ $row->kd_cust }} - {{ $row->nm_cust }}</td>
                            <td><span class="badge badge-info">{{ str_replace('_', ' ', strtoupper($row->status)) }}</span></td>
                            <td>{{ $row->order_no ?? '-' }}</td>
                            <td>
                                <a href="{{ route('sales.kunjungan.show', $row->id) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                    <i class="ti-eye"></i> Detail
                                </a>
                                @if($row->status === 'kunjungan')
                                    <a href="{{ route('order.tambah2') }}?customer={{ $row->kd_cust }}&kunjungan={{ $row->id }}" class="btn btn-sm btn-success" title="Buat Sales Order">
                                        <i class="ti-shopping-cart"></i> Buat SO
                                    </a>
                                @else
                                    <a href="{{ url('detailorder/'.$row->order_no) }}" class="btn btn-sm btn-outline-success" title="Lihat Order">
                                        <i class="ti-receipt"></i> Lihat SO
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Belum ada kunjungan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
