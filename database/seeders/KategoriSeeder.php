<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kategoriseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            [
                'kategori_id'=> 1, 
                'kategori_kode'=> 'KTG01',  
                'kategori_nama'=>'Perlengkapan Dapur',
            ],
            [
                'kategori_id'=> 2, 
                'kategori_kode'=> 'KTG02',  
                'kategori_nama'=>'Peralatan Sekolah',
            ],
            [
                'kategori_id'=> 3, 
                'kategori_kode'=> 'KTG03',  
                'kategori_nama'=>'Perlengkapan Rumah',
            ],
            [
                'kategori_id'=> 4, 
                'kategori_kode'=> 'KTG04',  
                'kategori_nama'=>'Perlengkapan Bayi',
            ],
            [
                'kategori_id'=> 5, 
                'kategori_kode'=> 'KTG05',  
                'kategori_nama'=>'Perlengkapan Motor',
            ],
        ];
DB::table('m_kategori')->insert($data);
    }
}