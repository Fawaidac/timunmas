@extends('layouts.template')

@section('content')
    <!-- Tambahan CSS custom untuk merapikan Select2 agar sesuai dengan tema Skydash -->
    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            height: calc(2.25rem + 2px); /* Menyesuaikan height input Bootstrap default */
            display: flex;
            align-items: center;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.5;
            padding-left: 0.75rem;
            color: #495057;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            top: 0;
            right: 10px;
        }
    </style>

    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="font-weight-bold">Order Penjualan</h3>
            <p class="text-muted mb-0">Input order penjualan dengan tampilan Skydash.</p>
        </div>
        <div class="col-md-4 text-md-right mt-3 mt-md-0">
            <a href="{{ url('listorder') }}" class="btn btn-light">
                <i class="ti-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Error!</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form id="formOrder" action="{{ route('order.simpan2') }}" method="POST">
        @csrf
        <input type="hidden" name="kunjungan_id" value="{{ $kunjunganId ?? '' }}">
        <div class="row">
            <div class="col-lg-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Order</h4>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Tanggal</label>
                                <input type="date" name="order_date" class="form-control" required>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Customer</label>
                                <!-- Ditambahkan class select2-enable jika ingin dicari juga nantinya -->
                                <select id="id_pelanggan" name="customer_id" class="form-control" required>
                                    <option value="">Cari Pelanggan</option>
                                    @foreach($customer as $kd_cust => $nm_cust)
                                        <option value="{{ $kd_cust }}" {{ ($selectedCustomer ?? '') == $kd_cust ? 'selected' : '' }}>{{ $kd_cust }} - {{ $nm_cust }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Tambah Barang</label>
                                <!-- Menambahkan style width 100% agar Select2 tidak menciut -->
                                <select name="a" class="form-control select2-barang" style="width: 100%;" autofocus>
                                    <option value="">Ketik kode/nama atau scan barcode...</option>
                                    @foreach($barang as $b)
                                        <option value="{{ $b->kd_brg }}" data-harga="{{ $b->harga_jl }}" data-nama="{{ $b->nm_brg }}">{{ $b->kd_brg }} - {{ $b->nm_brg }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">No</th>
                                    <th>Nama Barang</th>
                                    <th width="100">Jml</th>
                                    <th width="100">Sat</th>
                                    <th width="140" class="text-right">Harga</th>
                                    <th width="150" class="text-right">Sub Total</th>
                                    <th width="60" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-lg-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ringkasan</h4>

                        <div class="form-group">
                            <label>Total</label>
                            <div id="sub_total" class="form-control font-weight-bold text-right" style="height: auto; min-height: calc(2.25rem + 2px); display: flex; align-items: center; justify-content: flex-end;">Rp 0</div>
                            <input type="hidden" name="total" id="total_hidden" value="0">
                        </div>

                        <div class="form-group">
                            <label>Jenis Bayar</label>
                            <select id="id_type_bayar" name="id_type_bayar" class="form-control bayar_combo">
                                <option value="1">Tunai</option>
                                <option value="2">Kredit</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4"></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-info btn-block mb-2" id="btnSubmit">
                                <i class="ti-save mr-1"></i> (F1) Selesai
                            </button>
                            <a href="{{ url('listorder') }}" class="btn btn-danger btn-block">(F3) Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let itemIndex = 0;

    // Target ke class spesifik dan pastikan width mengikuti pembungkusnya
    $('.select2-barang').select2({
        placeholder: 'Ketik kode/nama atau scan barcode...',
        allowClear: true,
        width: 'resolve'
    });

    // Event ketika barang dipilih
    $('.select2-barang').on('change', function() {
        let selectedOption = $(this).find('option:selected');
        let kodeBarang = selectedOption.val();
        let namaBarang = selectedOption.data('nama');
        let harga = parseFloat(selectedOption.data('harga')) || 0;

        if (kodeBarang) {
            addItemToTable(kodeBarang, namaBarang, harga);
            $(this).val('').trigger('change');
        }
    });

    function addItemToTable(kode, nama, harga) {
        itemIndex++;
        // Menambahkan class 'align-middle' pada setiap td agar posisi input sejajar vertikal
        // Menggunakan input standard (tanpa form-control-sm) atau menggunakan form-control biasa agar tingginya pas dengan row
        let row = `
            <tr data-index="${itemIndex}">
                <td class="text-center align-middle">${itemIndex}</td>
                <td class="align-middle">
                    <span class="font-weight-medium">${nama}</span>
                    <input type="hidden" name="product_id[]" value="${kode}">
                    <input type="hidden" name="price[]" class="price-value" value="${harga}">
                </td>
                <td class="align-middle">
                    <input type="number" name="qty[]" class="form-control qty-input text-center" value="1" min="1" step="1" style="padding: 0.5rem;">
                </td>
                <td class="align-middle">
                    <input type="text" name="satuan[]" class="form-control text-center" value="PCS" style="padding: 0.5rem;">
                </td>
                <td class="text-right align-middle">
                    <span class="harga-display">${formatRupiah(harga)}</span>
                </td>
                <td class="text-right align-middle">
                    <span class="subtotal-display">${formatRupiah(harga)}</span>
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-sm btn-danger btn-remove" style="padding: 0.5rem 0.75rem;">
                        <i class="ti-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        $('tbody').append(row);
        calculateTotal();
    }

    // Event ketika qty berubah
    $(document).on('input', '.qty-input', function() {
        let row = $(this).closest('tr');
        let qty = parseFloat($(this).val()) || 0;
        let harga = parseFloat(row.find('.price-value').val()) || 0;
        let subtotal = qty * harga;

        row.find('.subtotal-display').text(formatRupiah(subtotal));
        calculateTotal();
    });

    // Event hapus item
    $(document).on('click', '.btn-remove', function() {
        $(this).closest('tr').remove();
        calculateTotal();
        reindexTable();
    });

    function calculateTotal() {
        let total = 0;
        $('tbody tr').each(function() {
            let qty = parseFloat($(this).find('.qty-input').val()) || 0;
            let price = parseFloat($(this).find('.price-value').val()) || 0;
            total += qty * price;
        });
        $('#sub_total').text(formatRupiah(total));
        $('#total_hidden').val(total);
    }

    function reindexTable() {
        $('tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    function formatRupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(amount);
    }

    // Validasi sebelum submit
    $('#formOrder').on('submit', function(e) {
        if ($('tbody tr').length === 0) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Tambahkan minimal 1 barang!'
            });
            return false;
        }
    });
});
</script>
@endpush