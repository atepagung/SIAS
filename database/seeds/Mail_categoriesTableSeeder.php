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
        \App\Mail_category::create([
        	'id' => '1',
            'title' => 'Pesan Masuk',
        ]);

        \App\Mail_category::create([
        	'id' => '2',
            'title' => 'Pesan Keluar',
        ]);

    }
}
