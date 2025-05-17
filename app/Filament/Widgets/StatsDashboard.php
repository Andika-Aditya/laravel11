<?php

namespace App\Filament\Widgets;

use App\Models\Sales;
use App\Models\Product;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsDashboard extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $counProduct = Product::count();
        $counEmployee = Employee::count();
        $sumSales = Sales::sum('jumlahbeli');
        $avgIncome = Sales::selectRaw('YEAR(tglTransaksi) as tahun, AVG(totalBayar) as rataRata')
            ->groupBy('tahun')
            ->pluck('rataRata');
        $avgIncomeAllYears = $avgIncome->avg();

        //  'Rp ' . number_format($totalRataRataPendapatan, 0, ',', '.'
        return [
            Stat::make("Pendapatan Rata-rata (Tahun)", 'Rp. ' . number_format($avgIncomeAllYears, 0, ',', '.')),
            Stat::make("Jumlah Produk", $counProduct . ' Produk'),
            Stat::make("Total Penjualan", $sumSales . ' Penjualan'),
            Stat::make("Jumlah Pegawai", $counEmployee . ' Pegawai'),
        ];
    }
}