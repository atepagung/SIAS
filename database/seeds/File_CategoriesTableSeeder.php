<?php

use Illuminate\Database\Seeder;

class File_CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\File_category::create([
            'title' => 'Surat Masuk',
        ]);

        \App\File_category::create([
            'title' => 'Memo',
        ]);

        \App\File_category::create([
            'title' => 'Surat Keluar',
        ]);
    }
}
