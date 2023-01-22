<?php

namespace Database\Seeders;

use App\Models\Teman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TemanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarTeman = [
            [
                'nama' => 'Budi',
                'alamat' => 'Blitar',
                'pekerjaan' => 'Tani',
            ]
        ];

        foreach ($daftarTeman as $key => $teman) {
            Teman::create($teman);
        }
    }
}
