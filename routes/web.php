<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Apotek - Home', 'carousels' => [
        [
            'idCarousel' => '0',
            'title' => 'Apotek',
            'subtitle' => 'Peduli',
            'description' => 'Selamat datang di Apotek Terpercaya. Kami menyediakan obat berkualitas dan layanan kesehatan profesional.',
            'imageCarousel' => 'img/slider-apotek-img.png',
        ],
        [
            'idCarousel' => '1',
            'title' => 'Kesehatan',
            'subtitle' => 'Utama',
            'description' => 'Kami menyediakan vitamin dan suplemen untuk menjaga kesehatan Anda.',
            'imageCarousel' => 'img/slider-apotek-2-img.png',
        ],
        [
            'idCarousel' => '2',
            'title' => 'Obat',
            'subtitle' => 'Berkualitas',
            'description' => 'Berbagai obat terpercaya dan aman tersedia di apotek kami.',
            'imageCarousel' => 'img/slider-apotek-3-img.png',
        ]
    ], 'topProduct' => [
        [
            'idTopProduct' => '0',
            'imgProduct' => 'img/bodrex.png',
            'titleProduct' => 'Bodrex',
            'overview' => 'Pereda Nyeri',
            'descriptionProduct' => 'Obat pereda nyeri dan demam yang efektif mengatasi sakit kepala dan pegal linu.',
        ],
        [
            'idTopProduct' => '1',
            'imgProduct' => 'img/paramex.png',
            'titleProduct' => 'Paramex',
            'overview' => 'Sakit Kepala',
            'descriptionProduct' => 'Atasi sakit kepala dengan paracetamol, kafein, dan kombinasi bahan aktif lainnya.',
        ],
        [
            'idTopProduct' => '2',
            'imgProduct' => 'img/SidoMuncul.png',
            'titleProduct' => 'Jamu Temulawak',
            'overview' => 'Daya Tahan',
            'descriptionProduct' => 'Jamu herbal tradisional untuk meningkatkan daya tahan dan menjaga kesehatan.',
        ],
        [
            'idTopProduct' => '3',
            'imgProduct' => 'img/enervonc.png',
            'titleProduct' => 'Enervon-C',
            'overview' => 'Vitamin C',
            'descriptionProduct' => 'Suplemen vitamin C dan multivitamin untuk menjaga daya tahan tubuh agar tetap fit.',
        ],
    ]]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'Apotek - About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Apotek - Contact']);
});

Route::get('/product', function () {
    return view('product', ['title' => 'Apotek - Product', 'productList' => [
        [
            'idTopProduct' => '0',
            'imgProduct' => 'img/bodrex.png',
            'titleProduct' => 'Bodrex',
            'overview' => 'Pereda Nyeri',
        ],
        [
            'idTopProduct' => '1',
            'imgProduct' => 'img/paramex.png',
            'titleProduct' => 'Paramex',
            'overview' => 'Sakit Kepala',
        ],
        [
            'idTopProduct' => '2',
            'imgProduct' => 'img/SidoMuncul.png',
            'titleProduct' => 'Jamu Temulawak',
            'overview' => 'Daya Tahan',
        ],
        [
            'idTopProduct' => '3',
            'imgProduct' => 'img/enervonc.png',
            'titleProduct' => 'Enervon-C',
            'overview' => 'Vitamin C',
        ],
    ]]);
});