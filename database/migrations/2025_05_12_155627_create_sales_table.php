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
            $table->foreignId('employee_id')->constrained(
                table: 'employees',
                indexName: 'sales_employee_id'
            );
            $table->foreignId('product_id')->constrained(
                table: 'products',
                indexName: 'sales_product_id'
            );

            $table->softDeletes();

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
