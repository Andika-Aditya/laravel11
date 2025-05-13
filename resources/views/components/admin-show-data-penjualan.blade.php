@props(['dataPenjualan'=>[]])

@foreach ($dataPenjualan as $index => $dataPenjualans)

    @php
        // Array bulan dalam bahasa Indonesia
        $bulanIndo = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Buat objek tanggal
        $tanggalObj = date_create($dataPenjualans['tglTransaksi']);

        // Memastikan tanggal valid sebelum diproses
        if ($tanggalObj) {
            $bulan = $bulanIndo[(int) date_format($tanggalObj, 'm')];
            $tanggalFormatted = date_format($tanggalObj, 'd') . ' ' . $bulan . ' ' . date_format($tanggalObj, 'Y');
        } else {
            $tanggalFormatted = 'Tanggal tidak valid';
        }
    @endphp
    <tr>
        <td>{{ $dataPenjualans['slug'] }}</td>
        <td>{{ $tanggalFormatted }}</td>
        <td>{{ 'Rp ' . number_format($dataPenjualans['totalBayar'], 0, ',', '.') }}</td>
        <td>{{ $dataPenjualans['metodeBayar'] == 1 ? 'Tunai' : 'Non-Tunai' }}</td>  
    </tr>

@endforeach

