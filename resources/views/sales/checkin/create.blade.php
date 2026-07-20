@extends('layouts.template')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="font-weight-bold">Check-in Lokasi</h3>
        <p class="text-muted mb-0">Ambil koordinat GPS perangkat saat tiba di lokasi customer.</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('sales.checkin.store') }}" method="POST" id="checkinForm">
            @csrf
            <div class="form-group">
                <label>Customer</label>
                <select name="kd_cust" class="form-control" required>
                    <option value="">Pilih Customer</option>
                    @foreach($customer as $kd_cust => $nm_cust)
                        <option value="{{ $kd_cust }}">{{ $kd_cust }} - {{ $nm_cust }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" readonly required>
            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" readonly required>
            </div>
            <div class="form-group">
                <label>Catatan</label>
                <textarea name="catatan" class="form-control" rows="3"></textarea>
            </div>
            <button type="button" class="btn btn-info" id="btnLocation">Ambil Lokasi GPS</button>
            <button type="submit" class="btn btn-primary">Check-in</button>
            <a href="{{ route('sales.checkin.index') }}" class="btn btn-light">Kembali</a>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#btnLocation').on('click', function () {
        if (!navigator.geolocation) {
            Swal.fire('Error', 'Browser tidak mendukung GPS/geolocation', 'error');
            return;
        }

        navigator.geolocation.getCurrentPosition(function (position) {
            $('#latitude').val(position.coords.latitude);
            $('#longitude').val(position.coords.longitude);
            Swal.fire('Berhasil', 'Lokasi GPS berhasil diambil', 'success');
        }, function () {
            Swal.fire('Error', 'Gagal mengambil lokasi. Pastikan izin lokasi diaktifkan.', 'error');
        });
    });
});
</script>
@endpush
