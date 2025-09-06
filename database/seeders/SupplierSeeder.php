<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'kode_supplier' => 'SUP001',
                'name_pt'       => 'PT. Maju Jaya',
                'alamat'        => 'Jl. Sudirman No. 123, Jakarta',
                'telepon'       => '081234567890',
            ],
            [
                'kode_supplier' => 'SUP002',
                'name_pt'       => 'PT. Sumber Makmur',
                'alamat'        => 'Jl. Merdeka No. 45, Bandung',
                'telepon'       => '082345678901',
            ],
            [
                'kode_supplier' => 'SUP003',
                'name_pt'       => 'CV. Aman Sentosa',
                'alamat'        => 'Jl. Gajah Mada No. 67, Surabaya',
                'telepon'       => '083456789012',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
