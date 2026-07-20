@extends('layouts.template')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="font-weight-bold">Approval Pembayaran</h3>
        <p class="text-muted mb-0">Pembayaran pending: {{ $pendingCount }}</p>
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
                        <th>No Bayar</th>
                        <th>Sales</th>
                        <th>Customer</th>
                        <th>Faktur</th>
                        <th>Nominal</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembayaran as $row)
                        <tr>
                            <td>{{ $row->no_bayar }}</td>
                            <td>{{ $row->nm_user }}</td>
                            <td>{{ $row->nm_cust }}</td>
                            <td>{{ $row->no_faktur }}</td>
                            <td>Rp {{ number_format($row->nominal, 0, ',', '.') }}</td>
                            <td>{{ strtoupper($row->metode_bayar) }}</td>
                            <td>
                                @if($row->status === 'approved')
                                    <span class="badge badge-success">LUNAS</span>
                                @elseif($row->status === 'rejected')
                                    <span class="badge badge-danger">DITOLAK</span>
                                @else
                                    <span class="badge badge-warning">PENDING</span>
                                @endif
                            </td>
                            <td>
                                @if($row->status === 'pending')
                                    <form action="{{ route('admin.pembayaran.approve', $row->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.pembayaran.reject', $row->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="reject_reason" value="Pembayaran tidak sesuai">
                                        <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                    </form>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center">Belum ada pembayaran</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
