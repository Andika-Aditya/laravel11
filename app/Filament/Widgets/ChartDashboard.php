<?php

namespace App\Filament\Widgets;

use App\Models\Sales;
use Filament\Widgets\ChartWidget;

class ChartDashboard extends ChartWidget
{
    protected static ?string $heading = 'Grafik Jumlah Pembelian (Tahun)';
    protected static ?string $maxWidth = '600px';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;
    protected function getData(): array
    {
        // Mengambil data penjualan per tahun
        $dataPenjualan = Sales::selectRaw('YEAR(tglTransaksi) as tahun, SUM(jumlahBeli) as total')
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')  // Urutkan tahun dari lampau ke terbaru
            ->get();

        // Mengonversi tahun menjadi string
        $tahun = $dataPenjualan->pluck('tahun')->map(fn($item) => (string) $item);

        // Mengonversi jumlahBeli menjadi integer
        $jumlahBeli = $dataPenjualan->pluck('total')->map(fn($item) => (int) $item);

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pembelian (Tahun)',
                    'data' => $jumlahBeli,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#007bff',
                ],
            ],
            'labels' => $tahun,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}