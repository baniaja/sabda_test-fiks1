<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'kode_supplier' => 'SUP001',
                'nama_supplier' => 'Food Supplier Indonesia',
                'kode_barang' => 'M001',
                'nama_barang' => 'Nasi Goreng Special',
                'jumlah_barang' => 50,
                'harga_dasar' => 15000,
                'harga_jual' => 25000,
                'category' => 'makanan',
                'description' => 'Nasi goreng dengan telur, ayam, dan sayuran segar'
            ],
            [
                'kode_supplier' => 'SUP001',
                'nama_supplier' => 'Food Supplier Indonesia',
                'kode_barang' => 'M002',
                'nama_barang' => 'Ayam Bakar Madu',
                'jumlah_barang' => 30,
                'harga_dasar' => 20000,
                'harga_jual' => 35000,
                'category' => 'makanan',
                'description' => 'Ayam bakar dengan saus madu dan rempah-rempah'
            ],
            [
                'kode_supplier' => 'SUP002',
                'nama_supplier' => 'Beverage Corp',
                'kode_barang' => 'D001',
                'nama_barang' => 'Es Teh Manis',
                'jumlah_barang' => 100,
                'harga_dasar' => 3000,
                'harga_jual' => 8000,
                'category' => 'minuman',
                'description' => 'Teh manis dingin yang menyegarkan'
            ],
            [
                'kode_supplier' => 'SUP002',
                'nama_supplier' => 'Beverage Corp',
                'kode_barang' => 'D002',
                'nama_barang' => 'Jus Jeruk Segar',
                'jumlah_barang' => 80,
                'harga_dasar' => 5000,
                'harga_jual' => 12000,
                'category' => 'minuman',
                'description' => 'Jus jeruk segar tanpa gula tambahan'
            ],
            [
                'kode_supplier' => 'SUP001',
                'nama_supplier' => 'Food Supplier Indonesia',
                'kode_barang' => 'M003',
                'nama_barang' => 'Sate Ayam',
                'jumlah_barang' => 40,
                'harga_dasar' => 18000,
                'harga_jual' => 30000,
                'category' => 'makanan',
                'description' => 'Sate ayam dengan bumbu kacang dan lontong'
            ],
            [
                'kode_supplier' => 'SUP002',
                'nama_supplier' => 'Beverage Corp',
                'kode_barang' => 'D003',
                'nama_barang' => 'Kopi Hitam',
                'jumlah_barang' => 60,
                'harga_dasar' => 4000,
                'harga_jual' => 10000,
                'category' => 'minuman',
                'description' => 'Kopi hitam pekat khas Indonesia'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
