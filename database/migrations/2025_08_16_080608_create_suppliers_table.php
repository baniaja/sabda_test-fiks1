<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('kode_supplier')->unique(); // Kode unik untuk supplier
            $table->string('name_pt'); // Nama perusahaan
            $table->string('alamat')->nullable(); // Alamat bisa kosong
            $table->string('telepon')->nullable(); // Telepon bisa kosong
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
