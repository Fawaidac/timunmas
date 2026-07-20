@php
    $role = session('role', 'sales');
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard hanya aktif jika route bernama 'dashboard' atau path '/' -->
        <li class="nav-item {{ request()->routeIs('dashboard') || request()->is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if($role === 'admin')
            <li class="nav-item {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('listbarang') }}">
                    <i class="icon-tag menu-icon"></i>
                    <span class="menu-title">Barang</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('customer.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('listcustomer') }}">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Customer</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('order.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('listorder') }}">
                    <i class="icon-bag menu-icon"></i>
                    <span class="menu-title">Data Order</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.pembayaran.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.pembayaran.index') }}">
                    <i class="icon-check menu-icon"></i>
                    <span class="menu-title">Approval Pembayaran</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Manage User</span>
                </a>
            </li>
        @endif

        @if($role === 'sales')
            <!-- Hanya aktif jika route diawali dengan 'sales.kunjungan.' -->
            <li class="nav-item {{ request()->routeIs('sales.kunjungan.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('sales.kunjungan.index') }}">
                    <i class="icon-map menu-icon"></i>
                    <span class="menu-title">Kunjungan Sales</span>
                </a>
            </li>

            <!-- Hanya aktif jika route diawali dengan 'sales.pembayaran.' -->
            <li class="nav-item {{ request()->routeIs('sales.pembayaran.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('sales.pembayaran.index') }}">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Penagihan</span>
                </a>
            </li>

            <!-- Cek Barang disesuaikan dengan route list barang Anda -->
            <li class="nav-item {{ request()->routeIs('barang.index') || request()->is('listbarang') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('listbarang') }}">
                    <i class="icon-tag menu-icon"></i>
                    <span class="menu-title">Cek Barang</span>
                </a>
            </li>

            <!-- Hanya aktif jika route diawali dengan 'sales.checkin.' -->
            <li class="nav-item {{ request()->routeIs('sales.checkin.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('sales.checkin.index') }}">
                    <i class="icon-location menu-icon"></i>
                    <span class="menu-title">Titik Poin</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">
                <i class="ti-power-off menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>