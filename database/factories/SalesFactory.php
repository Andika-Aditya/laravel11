<?php

namespace Database\Factories;

use App\Models\Sales;
use App\Models\Product;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Model untuk factory ini yaitu Sales
     *
     * @var string
     */
    protected $model = Sales::class;

    /**
     * Tentukan format data default untuk pembuatan data sales.
     *
     * @return array
     */

     public function employee( )BelongsTo   {
        return $this->belongsTo(Employee::class);
     }
    public function definition(): array
    {
        // Membuat nomor produk secara acak dengan faker
        $trxNumber = fake()->randomDigit() . fake()->randomDigit() . fake()->randomDigit();

        return [
            // Slug dengan format "Trx000"
            'slug' => 'trx' . str_pad(fake()->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),

            // Mengahasilkan employee_id sekaligus membuat data karyawan
            'employee_id' => Employee::factory(),

            // Mengahasilkan product_id sekaligus membuat data product
            'product_id' => Product::factory(),

            // Tanggal Transaksi
            'tglTransaksi' => fake()->date('Y-m-d'),

            // Metode Bayar (hanya 1 atau 2)
            'metodeBayar' => fake()->randomElement([1, 2]),

            // Jumlah Beli (antara 1 - 50)
            'jumlahBeli' => fake()->numberBetween(1, 50),

            // Total Bayar (antara 10000 - 1000000)
            'totalBayar' => fake()->numberBetween(10000, 1000000),
        ];
    }
}