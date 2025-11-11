<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];
        
        for ($i = 1; $i <= 15; $i++) {
            

            if ($i <= 5) {
                $supplier_id = 1;
                $jumlah_stok = 50; 
            } elseif ($i <= 10) {
                $supplier_id = 2;
                $jumlah_stok = 75; 
            } else {
                $supplier_id = 3;
                $jumlah_stok = 100;
            }

            $data[] = [
                'stok_id'      => $i, 
                'supplier_id'  => $supplier_id, 
                'barang_id'    => $i,          
                'user_id'      => 1,          
                'stok_tanggal' => $now->toDateString(), 
                'stok_jumlah'  => $jumlah_stok, 
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

       
        DB::table('t_stok')->insert($data);
    }
}