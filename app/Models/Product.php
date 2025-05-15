<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['slug', 'titleProduct', 'overview', 'imgProduct', 'descriptionProduct', 'harga', 'expired', 'stok'];

    // Fungsi menghitung jumlah produk
    public static function jumlahProduk()
    {
        return self::count();
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class, 'product_id');
    }
}
