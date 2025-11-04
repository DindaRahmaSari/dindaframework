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
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('user_id');
            // stok_tanggal datetime
            $table->dateTime('stok_tanggal');
            $table->integer('stok_jumlah');

            // FK untuk supplier_id -> m_supplier(supplier_id)
            $table->foreign('supplier_id')->references('supplier_id')->on('m_supplier');
            
            // FK untuk barang_id -> m_barang(barang_id)
            $table->foreign('barang_id')->references('barang_id')->on('m_barang');

            // FK untuk user_id -> m_user(user_id)
            $table->foreign('user_id')->references('user_id')->on('m_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok');
    }
};
