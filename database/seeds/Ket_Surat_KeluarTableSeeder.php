<?php

use Illuminate\Database\Seeder;

class Ket_Surat_KeluarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Ket_surat_keluar::create([
            'title' => 'lengkap',
        ]);

        \App\Ket_surat_keluar::create([
            'title' => 'butuh nomor',
        ]);

        \App\Ket_surat_keluar::create([
            'title' => 'review',
        ]);
    }
}
