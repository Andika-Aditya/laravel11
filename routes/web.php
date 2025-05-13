<?php

use App\Models\Carousel;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Sales;
use Illuminate\Support\Facades\Route;

// Fungsi untuk menghitung laba bersih
function hitungLabaBersih()
{
    // Total pendapatan dari semua transaksi
    $totalPendapatan = Sales::sum('totalBayar');

    // Total beban (asumsi: jumlah pembelian * harga pokok Rp 5.000)
    $totalBeban = Sales::sum('jumlahBeli') * 5000;

    // Laba bersih
    $labaBersih = $totalPendapatan - $totalBeban;

    // Laba bersih dalam persen
    $labaPersen = $totalPendapatan > 0 ? ($labaBersih / $totalPendapatan) * 100 : 0;

    // Mengembalikan data dalam bentuk array
    return $labaBersih;
}
Route::get('/', function () {
    return view('home', ['title' => 'Apotek - Beranda', 'carousels' => Carousel::all(), 'topProduct' => Product::all()]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'Apotek - Tentang Kami']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Apotek - Kontak']);
});

Route::get('/product', function () {
    return view('product', ['title' => 'Apotek - Produk', 'productList' => Product::all()]);
});

Route::get('/admin/adminHome', function () {
    // Menghitung total pendapatan tahunan secara langsung
    $totalRataRataPendapatan = Sales::rataRataPendapatan();

    // Menghitung jumlah produk
    $jumlahProduk = Product::jumlahProduk();

    // Menghitung total penjualan
    $totalPenjualan = Sales::totalPenjualan();

    // Menghitung total penjualan
    $totalKaryawan = Employee::totalKaryawan();

    // Mengambil data penjualan per tahun
    $dataPenjualan = Sales::selectRaw('YEAR(tglTransaksi) as tahun, SUM(jumlahBeli) as total')
        ->groupBy('tahun')
        ->orderBy('tahun', 'asc')  // Urutkan tahun dari lampau ke terbaru
        ->get();


    // Mengonversi tahun menjadi string
    $tahun = $dataPenjualan->pluck('tahun')->map(fn($item) => (string) $item);

    // Mengonversi jumlahBeli menjadi integer
    $jumlahBeli = $dataPenjualan->pluck('total')->map(fn($item) => (int) $item);

    return view('admin.adminHome', [
        'title' => 'Apotek | Admin - Beranda',
        'totalRataRataPendapatan' => 'Rp ' . number_format($totalRataRataPendapatan, 0, ',', '.'),
        'jumlahProduk' => $jumlahProduk,
        'totalPenjualan' => $totalPenjualan,
        'totalKaryawan' => $totalKaryawan,
        'tahun' => $tahun,
        'jumlahBeli' => $jumlahBeli

    ]);
});

Route::get('/admin/adminDataObat', function () {
    return view('admin.adminDataObat', ['title' => 'Apotek | Admin - Data Obat', 'dataObat' => Product::all()]);
});

Route::get('/admin/adminDataKaryawan', function () {
    return view('admin.adminDataKaryawan', ['title' => 'Apotek | Admin - Data Karyawan', 'dataKaryawan' => Employee::all()]);
});

Route::get('/admin/adminDataPenjualan', function () {
    return view('admin.adminDataPenjualan', ['title' => 'Apotek | Admin - Data Penjualan', 'dataPenjualan' => Sales::all()]);
});

Route::get('/admin/adminLogin', function () {
    return view('admin.adminLogin', ['title' => 'Apotek | Admin - Login']);
});