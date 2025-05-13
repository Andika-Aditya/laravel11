<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = ['slug', 'titleProduct',    'overview',    'imgProduct', 'descriptionProduct', 'harga', 'expired', 'stok'];

    // Fungsi menghitung jumlah produk
    public static function jumlahProduk()
    {
        return self::count();
    }
}