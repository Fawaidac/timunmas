@extends('layouts.template')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="font-weight-bold">Titik Poin / Check-in</h3>
        <p class="text-muted mb-0">Riwayat lokasi check-in customer.</p>
    </div>
    <div class="col-md-4 text-md-right">
        <a href="{{ route('sales.checkin.create') }}" class="btn btn-primary">Check-in Baru</a>
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
                        <th>Waktu</th>
                        <th>Customer</th>
                        <th>Alamat</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checkins as $row)
                        <tr>
                            <td>{{ $row->waktu_checkin->format('d/m/Y H:i') }}</td>
                            <td>{{ $row->kd_cust }} - {{ $row->nm_cust }}</td>
                            <td>{{ $row->alamat_lengkap ?? '-' }}</td>
                            <td>{{ $row->latitude }}</td>
                            <td>{{ $row->longitude }}</td>
                            <td>{{ $row->catatan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">Belum ada check-in</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
