<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $data = [];
        $barang_id_counter = 1;
        
    
        $items_s1 = [
            ['nama' => 'Panci Anti Lengket', 'kategori' => 1, 'beli' => 85000, 'jual' => 120000],
            ['nama' => 'Spatula Silikon Set', 'kategori' => 1, 'beli' => 30000, 'jual' => 45000],
            ['nama' => 'Keset Kaki Dapur', 'kategori' => 3, 'beli' => 40000, 'jual' => 60000],
            ['nama' => 'Lap Dapur Serbaguna', 'kategori' => 1, 'beli' => 15000, 'jual' => 25000],
            ['nama' => 'Rak Sepatu Susun', 'kategori' => 3, 'beli' => 90000, 'jual' => 135000],
        ];

        $items_s2 = [
            ['nama' => 'Buku Gambar A3', 'kategori' => 2, 'beli' => 18000, 'jual' => 25000],
            ['nama' => 'Botol Susu Bayi 250ml', 'kategori' => 4, 'beli' => 55000, 'jual' => 75000],
            ['nama' => 'Pensil Warna Set 12', 'kategori' => 2, 'beli' => 28000, 'jual' => 40000],
            ['nama' => 'Diaper Rash Cream', 'kategori' => 4, 'beli' => 35000, 'jual' => 50000],
            ['nama' => 'Tas Ransel Sekolah', 'kategori' => 2, 'beli' => 95000, 'jual' => 130000],
        ];


        $items_s3 = [
            ['nama' => 'Sarung Jok Motor Anti Air', 'kategori' => 5, 'beli' => 60000, 'jual' => 85000],
            ['nama' => 'Kunci Pas Set 10pc', 'kategori' => 5, 'beli' => 110000, 'jual' => 150000],
            ['nama' => 'Sapu Ijuk Terbaik', 'kategori' => 3, 'beli' => 15000, 'jual' => 22000],
            ['nama' => 'Kain Lap Microfiber', 'kategori' => 5, 'beli' => 25000, 'jual' => 35000],
            ['nama' => 'Pel Lantai Otomatis', 'kategori' => 3, 'beli' => 65000, 'jual' => 90000],
        ];


        $insert_items = function ($items) use (&$data, &$barang_id_counter, $now) {
            foreach ($items as $item) {
                $data[] = [
                    'barang_id'    => $barang_id_counter, 
                    'kategori_id'  => $item['kategori'], 
                    'barang_kode'  => 'BRG' . str_pad($barang_id_counter, 3, '0', STR_PAD_LEFT), 
                    'barang_nama'  => $item['nama'],
                    'harga_beli'   => $item['beli'],
                    'harga_jual'   => $item['jual'],
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ];
                $barang_id_counter++;
            }
        };

        $insert_items($items_s1);
        $insert_items($items_s2);
        $insert_items($items_s3);

        DB::table('m_barang')->insert($data);
    }
}