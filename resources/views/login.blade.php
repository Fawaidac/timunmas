<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Timun Mas | Login</title>

    <link rel="stylesheet" href="{{ asset('skydash/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('skydash/images/favicon.png') }}">
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 shadow-sm rounded">
                            <div class="brand-logo mb-4">
                                <h2 class="font-weight-bold text-primary mb-0">Timun Mas</h2>
                                <small class="text-muted">Sales Order Management</small>
                            </div>

                            <h4>Selamat datang</h4>
                            <h6 class="font-weight-light mb-4">Silakan login untuk melanjutkan.</h6>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0 pl-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('alert'))
                                <div class="alert alert-danger">{{ session('alert') }}</div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form class="pt-3" action="{{ url('loginPost') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="user" id="user" class="form-control form-control-lg" placeholder="Nama user" value="{{ old('user') }}" oninput="this.value = this.value.toUpperCase()" autofocus required>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        MASUK
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('skydash/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('skydash/js/off-canvas.js') }}"></script>
    <script src="{{ asset('skydash/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('skydash/js/template.js') }}"></script>
</body>
</html>
