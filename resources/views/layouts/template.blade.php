<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Timun Mas</title>

    <link rel="stylesheet" href="{{ asset('skydash/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
    <link rel="shortcut icon" href="{{ asset('skydash/images/favicon.png') }}">
</head>
<body>
    <div class="container-scroller">
        @include('layouts.header')

        <div class="container-fluid page-body-wrapper">
            @include('layouts.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                @include('layouts.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('skydash/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('skydash/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('skydash/js/off-canvas.js') }}"></script>
    <script src="{{ asset('skydash/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('skydash/js/template.js') }}"></script>
    <script src="{{ asset('skydash/js/settings.js') }}"></script>
    <script src="{{ asset('skydash/js/todolist.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(function () {
            if ($('#data-table1').length) {
                $('#data-table1').DataTable({
                    paging: true,
                    lengthChange: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: false
                });
            }

            if ($('#data-table2').length) {
                $('#data-table2').DataTable({
                    paging: true,
                    lengthChange: true,
                    searching: true,
                    ordering: false,
                    info: true,
                    autoWidth: false
                });
            }
        });
    </script>

    <script>
        $(function () {
            $(document).on('click', '#approve', function (e) {
                e.preventDefault();

                const nomor = $(this).attr('data-nomor');
                const noent = $(this).attr('data-noent');
                const ket = $(this).attr('data-ket');
                const cust = $(this).attr('data-cust');
                const user = $(this).attr('data-user');

                if (user === '') {
                    Swal.fire({
                        title: 'Anda yakin?',
                        text: 'Menyetujui permintaan ' + ket + ' atas NO: ' + noent + ', Cust = ' + cust,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Approve'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = '/approve/' + nomor;
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Permintaan ini telah di-approve sebelumnya!',
                        icon: 'error'
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
