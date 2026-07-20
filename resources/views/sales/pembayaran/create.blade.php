@extends('layouts.template')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="font-weight-bold">Input Pembayaran</h3>
        <p class="text-muted mb-0">Simpan pembayaran dengan status Pending Approval.</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('sales.pembayaran.store') }}" method="POST">
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
                <label>Faktur</label>
                <select name="no_faktur" class="form-control" required>
                    <option value="">Pilih Faktur</option>
                    @foreach($faktur as $row)
                        <option value="{{ $row->no_ent }}">{{ $row->no_ent }} - {{ $row->nm_cust }} - Rp {{ number_format($row->total, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nominal Pembayaran</label>
                <input type="number" name="nominal" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label>Metode Bayar</label>
                <select name="metode_bayar" class="form-control" required>
                    <option value="cash">Cash</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
            <a href="{{ route('sales.pembayaran.index') }}" class="btn btn-light">Kembali</a>
        </form>
    </div>
</div>
@endsection
