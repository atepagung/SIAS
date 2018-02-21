<?php

use Illuminate\Database\Seeder;

class Mail_categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_categories')->insert([
        	'id' => '1',
            'title' => 'Pesan Masuk',
        ]);

        DB::table('mail_categories')->insert([
        	'id' => '2',
            'title' => 'Pesan Keluar',
        ]);

    }
}
