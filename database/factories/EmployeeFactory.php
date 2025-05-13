<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Model untuk factory ini yaitu Employee
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Tentukan format data default untuk pembuatan data Employee.
     *
     * @return array
     */
    public function definition()
    {
        // Membuat nomor karyawan secara acak dengan faker
        $employeeNumber = fake()->randomDigit() . fake()->randomDigit() . fake()->randomDigit();

        return [
            // Slug dengan format "KRY000"
            'slug' => 'kry' . str_pad(fake()->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),

            // Data tetap
            'namaKaryawan' => fake()->name(),
            'tglLahir' => $this->faker->date('Y-m-d'),  // Format tanggal: YYYY-MM-DD

            // Data shift tetap
            'shif' => $this->faker->randomElement(['1', '2', '3']),
        ];
    }
}