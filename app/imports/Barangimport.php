<?php
namespace App\Imports;

use App\Models\BarangModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new BarangModel([
            'kategori_id' => $row['kategori_id'],
            'barang_kode' => $row['kode'],
            'barang_nama' => $row['nama'],
            'harga_beli' => $row['harga_beli'],
            'harga_jual' => $row['harga_jual'],
        ]);
    }
}
