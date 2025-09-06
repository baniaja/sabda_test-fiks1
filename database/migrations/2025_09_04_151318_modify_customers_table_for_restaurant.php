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
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['kode_customer', 'alamat', 'telepon', 'email']);
            $table->string('customer_name', 100)->after('id');
            $table->string('table_number', 10)->after('customer_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('kode_customer', 50)->unique()->after('id');
            $table->string('alamat')->nullable()->after('kode_customer');
            $table->string('telepon', 20)->nullable()->after('alamat');
            $table->string('email')->nullable()->after('telepon');
            $table->dropColumn(['customer_name', 'table_number']);
        });
    }
};
