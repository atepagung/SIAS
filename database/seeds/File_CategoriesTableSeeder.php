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
        DB::table('file_categories')->insert([
            'title' => 'Surat Masuk',
        ]);

        DB::table('file_categories')->insert([
            'title' => 'Memo',
        ]);

        DB::table('file_categories')->insert([
            'title' => 'Surat Keluar',
        ]);
    }
}
