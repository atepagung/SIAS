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
        DB::table('ket_surat_keluar')->insert([
            'title' => 'lengkap',
        ]);

        DB::table('ket_surat_keluar')->insert([
            'title' => 'butuh nomor',
        ]);

        DB::table('ket_surat_keluar')->insert([
            'title' => 'review',
        ]);
    }
}
