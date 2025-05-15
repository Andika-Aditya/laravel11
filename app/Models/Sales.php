<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    //
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['slug', 'tglTransaksi', 'metodeBayar', 'jumlahBeli', 'employee_id', 'product_id', 'totalBayar'];

    // Fungsi menghitung total pendapatan tahunan
    public static function rataRataPendapatan($tahun = null)
    {
        // Langkah 1: Menghitung rata-rata pendapatan per tahun
        $rataRataPerTahun = self::selectRaw('YEAR(tglTransaksi) as tahun, AVG(totalBayar) as rataRata')
            ->groupBy('tahun')
            ->pluck('rataRata');

        // Langkah 2: Menghitung rata-rata dari semua rata-rata per tahun
        $rataRataKeseluruhan = $rataRataPerTahun->avg();

        return $rataRataKeseluruhan;
    }


    // Fungsi menghitung total penjualan
    public static function totalPenjualan()
    {
        return self::sum('jumlahBeli');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Mutator untuk menghitung total bayar
    public function setTotalBayarAttribute($value)
    {
        // Ambil harga dari relasi product
        $harga = $this->product->harga ?? 0;
        $jumlahBeli = $this->jumlahBeli ?? 0;

        // Hitung total bayar
        $this->attributes['totalBayar'] = $harga * $jumlahBeli;
    }
}
