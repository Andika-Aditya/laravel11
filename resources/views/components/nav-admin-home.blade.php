<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <h5 class="d-block" style="color: white;"> Admin </h5>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <x-nav-link-admin-home href="/admin/adminHome" :active="request()->is('admin/adminHome')">
                    <i class="nav-icon fa fa-home"></i>
                    Beranda
                </x-nav-link-admin-home>
                <x-nav-link-admin-home href="/admin/adminDataObat" :active="request()->is('admin/adminDataObat')">
                    <i class="nav-icon fa fa-medkit"></i>
                    Data Obat
                </x-nav-link-admin-home>
                <x-nav-link-admin-home href="/admin/adminDataKaryawan" :active="request()->is('admin/adminDataKaryawan')">
                    <i class="nav-icon fa fa-group"></i>
                    Data Karyawan
                </x-nav-link-admin-home>
                <x-nav-link-admin-home href="/admin/adminDataPenjualan" :active="request()->is('admin/adminDataPenjualan')">
                    <i class="nav-icon fa fa-bar-chart"></i>
                    Data Penjualan
                </x-nav-link-admin-home>
                <x-nav-link-admin-home href="/admin/adminLogin" :active="request()->is('/admin/adminLogin')">
                    <i class="nav-icon fa fa-share"></i>
                    LogOut
                </x-nav-link-admin-home>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>