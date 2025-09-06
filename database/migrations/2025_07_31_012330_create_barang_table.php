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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_supplier', 50)->index();
            $table->string('nama_supplier', 100);
            $table->string('kode_barang', 50)->unique();
            $table->string('nama_barang', 100)->index();
            $table->integer('jumlah_barang')->default(0);
            $table->decimal('harga_dasar', 10, 2);
            $table->decimal('harga_jual', 10, 2);
            $table->timestamps();

            $table->index(['kode_supplier', 'kode_barang']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
