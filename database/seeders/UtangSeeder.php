<?php

namespace Database\Seeders;

use App\Models\Utang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarUtang = [
            [
                'id_teman' => 1,
                'nominal' => 100000,
                'alasan' => 'Pengen Kaya',
                'alasan' => 'Pengen Kaya',
                'tanggal_peminjaman' => '2023-01-22',
                'tanggal_lunas' => '2023-01-22',
                'keterangan_lunas' => 'belum',
            ]
        ];

        foreach ($daftarUtang as $key => $utang) {
            Utang::create($utang);
        }
    }
}
