<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $barangs = [
            [
                'kode_supplier' => 'SUP001',
                'nama_supplier' => 'PT Maju Jaya',
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Laptop ASUS ROG',
                'jumlah_barang' => 50,
                'harga_dasar' => 5000000,
                'harga_jual' => 7500000,
            ],
            [
                'kode_supplier' => 'SUP002',
                'nama_supplier' => 'PT Sejahtera',
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Smartphone Samsung Galaxy',
                'jumlah_barang' => 100,
                'harga_dasar' => 3000000,
                'harga_jual' => 4500000,
            ],
            [
                'kode_supplier' => 'SUP003',
                'nama_supplier' => 'PT Maju Sejahtera',
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Tablet Samsung Galaxy Tab',
                'jumlah_barang' => 75,
                'harga_dasar' => 2000000,
                'harga_jual' => 3000000,
            ],
            [
                'kode_supplier' => 'SUP004',
                'nama_supplier' => 'PT Maju Jaya',
                'kode_barang' => 'BRG004',
                'nama_barang' => 'Smartphone iPhone',
                'jumlah_barang' => 25,
                'harga_dasar' => 10000000,
                'harga_jual' => 15000000,
            ],
            [
                'kode_supplier' => 'SUP005',
                'nama_supplier' => 'PT Sejahtera',
                'kode_barang' => 'BRG005',
                'nama_barang' => 'Tablet iPad',
                'jumlah_barang' => 50,
                'harga_dasar' => 5000000,
                'harga_jual' => 7500000,
            ],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
