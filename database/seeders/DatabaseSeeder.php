<?php

namespace Database\Seeders;

use App\Models\Carousel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Carousel::insert([
            [
                'slug' => 'CRL0',
                'title' => 'Apotek',
                'subtitle' => 'Peduli',
                'description' => 'Selamat datang di Apotek Terpercaya. Kami menyediakan obat berkualitas dan layanan kesehatan profesional.',
                'imageCarousel' => 'img/slider-apotek-img.png',
            ],
            [
                'slug' => 'CRL1',
                'title' => 'Kesehatan',
                'subtitle' => 'Utama',
                'description' => 'Kami menyediakan vitamin dan suplemen untuk menjaga kesehatan Anda.',
                'imageCarousel' => 'img/slider-apotek-2-img.png',
            ],
            [
                'slug' => 'CRL2',
                'title' => 'Obat',
                'subtitle' => 'Berkualitas',
                'description' => 'Berbagai obat terpercaya dan aman tersedia di apotek kami.',
                'imageCarousel' => 'img/slider-apotek-3-img.png',
            ]
        ]);

        User::insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
