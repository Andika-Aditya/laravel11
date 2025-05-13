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
        // Membuat nomor produk secara acak dengan faker
        $productNumber = fake()->randomDigit() . fake()->randomDigit() . fake()->randomDigit();

        return [
            // Slug dengan format "obt000"
            'slug' => Str::slug('obt' . $productNumber, '-'),

            // Title produk dengan 2 kata
            'titleProduct' => fake()->sentence(2, false),

            // Menggunakan list kategori obat secara acak
            'overview' => fake()->randomElement([
                'Antibiotik Oral',
                'Antihistamin Tablet',
                'Obat Sakit',
                'Vitamin C',
                'Antipiretik Sirup',
                'Obat Luka',
                'Antasida Cair',
                'Obat Batuk',
                'Obat Demam',
                'Obat Maag',
                'Obat Flu',
                'Antinyeri Topikal',
                'Obat Diare',
                'Obat Kulit',
                'Obat Gatal',
                'Obat Jerawat',
                'Obat Tetes',
                'Obat Herbal',
                'Obat Migrain',
                'Antifungal Krim'
            ]),

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