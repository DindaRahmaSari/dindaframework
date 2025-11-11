<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];
        $detail_id_counter = 1;
        
        
        $harga_jual_fiktif = [
            1 => 120000, 2 => 45000, 3 => 60000, 4 => 25000, 5 => 135000,
            6 => 25000, 7 => 75000, 8 => 40000, 9 => 50000, 10 => 130000,
            11 => 85000, 12 => 150000, 13 => 22000, 14 => 35000, 15 => 90000,
        ];
        
        for ($penjualan_id = 1; $penjualan_id <= 10; $penjualan_id++) {
            
            
            $barang_dijual = range(1, 15);
            shuffle($barang_dijual); 
            $barang_dijual = array_slice($barang_dijual, 0, 3); 
            foreach ($barang_dijual as $barang_id) {
                
                $harga = $harga_jual_fiktif[$barang_id] ?? 0; 
                $jumlah = rand(1, 5);

                $data[] = [
                    'detail_id'      => $detail_id_counter, 
                    'penjualan_id'   => $penjualan_id, 
                    'barang_id'      => $barang_id, 
                    'harga'          => $harga, 
                    'jumlah'         => $jumlah, 
                    'created_at'     => $now->copy()->subDays($penjualan_id)->addHours(9),
                    'updated_at'     => $now->copy()->subDays($penjualan_id)->addHours(9),
                ];
                $detail_id_counter++;
            }
        }

    
        DB::table('t_penjualan_detail')->insert($data);
    }
}