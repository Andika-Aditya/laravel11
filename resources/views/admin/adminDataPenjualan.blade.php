<!DOCTYPE html>
<html lang="en">
<x-head-admin-home>
  <x-slot:title>
    {{ $title }}
  </x-slot:title>
</x-head-admin-home>

<body class="hold-transition sidebar-mini fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <x-nav-admin-home></x-nav-admin-home>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
      <!-- Main content -->
      <section class="content mt-4">
        <div class="card table-responsive">
          <div class="card-header">
            <h3 class="card-title fw-700">
              Data Penjualan
            </h3>
          </div>
            <div class="card-body">
              <table class="table table-striped text-xs" id="datatable">
                <thead>
                  <th>Kode Transaksi</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total Bayar</th>
                  <th>Metode Bayar</th>
                </thead>
                <tbody>
                  <x-admin-show-data-penjualan :dataPenjualan="$dataPenjualan"></x-admin-show-data-penjualan>
                </tbody>
              </table>
            </div>
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <x-footer-admin-home></x-footer-admin-home>
</body>
</html>