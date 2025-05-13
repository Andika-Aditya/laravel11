<?php

namespace Database\Factories;

use App\Models\Carousel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carousel>
 */
class CarouselFactory extends Factory
{
    protected $model = \App\Models\Carousel::class;

    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(0, 2),
            'slug' => $this->faker->unique()->randomElement(['CRL0', 'CRL1', 'CRL2']),
            'title' => $this->faker->randomElement(['Apotek', 'Kesehatan', 'Obat']),
            'subtitle' => $this->faker->randomElement(['Peduli', 'Utama', 'Berkualitas']),
            'description' => $this->faker->randomElement([
                'Selamat datang di Apotek Terpercaya. Kami menyediakan obat berkualitas dan layanan kesehatan profesional.',
                'Kami menyediakan vitamin dan suplemen untuk menjaga kesehatan Anda.',
                'Berbagai obat terpercaya dan aman tersedia di apotek kami.'
            ]),
            'imageCarousel' => $this->faker->randomElement([
                'img/slider-apotek-img.png',
                'img/slider-apotek-2-img.png',
                'img/slider-apotek-3-img.png'
            ]),
        ];
    }
}
