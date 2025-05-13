@props(['dataObat'=>[]])

@foreach ($dataObat as $index => $dataObats)

    @php
        // Array bulan dalam bahasa Indonesia
        $bulanIndo = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Buat objek tanggal
        $tanggalObj = date_create($dataObats['expired']);

        // Memastikan tanggal valid sebelum diproses
        if ($tanggalObj) {
            $bulan = $bulanIndo[(int) date_format($tanggalObj, 'm')];
            $tanggalFormatted = date_format($tanggalObj, 'd') . ' ' . $bulan . ' ' . date_format($tanggalObj, 'Y');
        } else {
            $tanggalFormatted = 'Tanggal tidak valid';
        }
    @endphp

    <tr>
        <td>{{ $dataObats['slug'] }}</td>
        <td>{{ $dataObats['titleProduct'] }}</td>
        <td>{{ $dataObats['overview'] }}</td>
        <td>{{ $dataObats['stok'] }}</td>
        <td>{{ 'Rp ' . number_format($dataObats['harga'], 0, ',', '.') }}</td>
        <td>{{ $tanggalFormatted }}</td>
    </tr>

@endforeach

