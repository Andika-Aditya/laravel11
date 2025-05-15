<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Model untuk factory ini yaitu Product
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Tentukan format data default untuk pembuatan data Product.
     *
     * @return array
     */
    public function definition()
    {

        return [
            // Slug dengan format "obt-000"
            'slug' => 'obt' . str_pad(fake()->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),

            // Title produk dengan 2 kata
            'titleProduct' => fake()->sentence(2, false),

            // Menggunakan list kategori obat secara acak
            'overview' => fake()->randomElement(['1', '2', '3']),

            // Gambar produk tetap
            'imgProduct' => 'img/no-image.png',

            // Deskripsi maksimal 100 karakter
            'descriptionProduct' => fake()->text(100),

            // Harga produk acak (antara 1000 - 100000)
            'harga' => fake()->numberBetween(1000, 100000),

            // Tanggal kedaluwarsa acak dalam 1-2 tahun ke depan
            'expired' => fake()->dateTimeBetween('+1 year', '+2 years')->format('Y-m-d'),

            // Stok produk acak (antara 10 - 100)
            'stok' => fake()->numberBetween(10, 100),
        ];
    }
}
