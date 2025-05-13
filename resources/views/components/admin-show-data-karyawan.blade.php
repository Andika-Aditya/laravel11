@props(['dataKaryawan'=>[]])

@foreach ($dataKaryawan as $index => $dataKaryawans)

    @php
        // Array bulan dalam bahasa Indonesia
        $bulanIndo = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Buat objek tanggal
        $tanggalObj = date_create($dataKaryawans['tglLahir']);

        // Memastikan tanggal valid sebelum diproses
        if ($tanggalObj) {
            $bulan = $bulanIndo[(int) date_format($tanggalObj, 'm')];
            $tanggalFormatted = date_format($tanggalObj, 'd') . ' ' . $bulan . ' ' . date_format($tanggalObj, 'Y');
        } else {
            $tanggalFormatted = 'Tanggal tidak valid';
        }
    @endphp

    <tr>
        <td>{{ $dataKaryawans['slug'] }}</td>
        <td>{{ $dataKaryawans['namaKaryawan'] }}</td>
        <td>{{ $tanggalFormatted }}</td>
        <td>
            {{ $dataKaryawans['shif'] == 1 ? 'Pagi' : ($dataKaryawans['shif'] == 2 ? 'Siang' : ($dataKaryawans['shif'] == 3 ? 'Malam' : 'Tidak Diketahui')) }}
        </td>
    </tr>

@endforeach

