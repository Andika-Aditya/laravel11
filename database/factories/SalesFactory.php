<?php

namespace Database\Factories;

use App\Models\Sales;
use App\Models\Product;
use App\Models\Employee;
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
    public function definition(): array
    {
        // Mengambil slug dari produk dan karyawan secara acak
        $product = Product::inRandomOrder()->first();
        $employee = Employee::inRandomOrder()->first();

        // Jika tidak ada data, gunakan slug default
        $productSlug = $product ? $product->slug : 'obt00000';
        $employeeSlug = $employee ? $employee->slug : 'KRY0000';


        // Membuat nomor produk secara acak dengan faker
        $trxNumber = fake()->randomDigit() . fake()->randomDigit() . fake()->randomDigit();

        return [
            // Slug dengan format "Trx000"
            'slug' => Str::slug('trx' . $trxNumber, '-'),

            // Product Slug dengan format "obt000"
            'product_slug' => $productSlug,

            // Employee Slug dengan format "kry000"
            'employee_slug' => $employeeSlug,

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
