<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->timestamp('tglTransaksi');
            $table->char('metodeBayar', 1);
            $table->integer('jumlahBeli');
            $table->integer('totalBayar');

            // Menambahkan foreign key dengan slug (string)
            $table->string('product_slug');
            $table->string('employee_slug');

            // Relasi ke tabel products dan employees
            $table->foreign('product_slug')->references('slug')->on('products');
            $table->foreign('employee_slug')->references('slug')->on('employees');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
