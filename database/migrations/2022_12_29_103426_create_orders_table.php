<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("jumlah_pesanan"); // Macam Pesanan
            $table->bigInteger("total_pesanan"); // Total Dari semua yg dipesan misal pesan esteh 2 maka value = 2
            $table->bigInteger("grand_total");
            $table->String("status");
            $table->String("nama_pemesan");
            $table->foreignId("employee_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};