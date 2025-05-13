<!DOCTYPE html>
<html lang="en">

<x-head-admin-home>
  <x-slot:title>
    {{ $title }}
  </x-slot:title>
</x-head-admin-home>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <x-nav-admin-home></x-nav-admin-home>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <div class="col-sm-12">
              <h1 align="center">Dashboard</h1>
            </div>
      </section>
      <!-- Main content -->
          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendapatan (Mean)</span>
                <span class="info-box-number">
                  {{ $totalRataRataPendapatan}}
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-boxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Produk</span>
                <span class="info-box-number">{{ $jumlahProduk }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-shopping-cart icon-color-white"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Penjualan</span>
                <span class="info-box-number">{{ $totalPenjualan }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gray elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Karyawan</span>
                <span class="info-box-number">{{ $totalKaryawan }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Riwayat Pembelian (/Tahun)</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md">
                    <div class="chart"> 
                      <canvas id="visitors-chart" height="200"></canvas>
                    </div>
                  </div>
                  <!-- /.col -->
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    </div>
    <x-footer-admin-home></x-footer-admin-home>
    <script>
    $(function () {
      var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
      }
      var $visitorsChart = document.getElementById('visitors-chart').getContext('2d')
      
      var visitorsChart = new Chart($visitorsChart, {
        data: {
          labels: {!! json_encode($tahun->toArray()) !!},
          datasets: [{
            label: 'Jumlah Pembelian (/Tahun)',
            type: 'line',
            data: {!! json_encode($jumlahBeli->toArray()) !!},
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            pointBorderColor: '#007bff',
            pointBackgroundColor: '#007bff',
            fill: false
            // pointHoverBackgroundColor: '#007bff',
            // pointHoverBorderColor    : '#007bff'
          }]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: 'index',
            intersect: true
          },
          hover: {
              mode: 'index',
              intersect: true
          },
          legend: {
              // display: false
              position: 'top',
          },
          title: {
            display: true,
            text: 'Grafik Jumlah Pembelian (/Tahun)'
          },
          scales: {
              yAxes: [{
              // display: false,
              gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
              },
              ticks: $.extend({
                  beginAtZero: true,
                  suggestedMax: {{ max($jumlahBeli->toArray()) + 10 }}
              }, ticksStyle)
              }],
              xAxes: [{
              display: true,
              gridLines: {
                  display: false
              },
              ticks: ticksStyle
              }]
          }
        }
      })
    });
    
    </script>
</body>
</html>
