<?php

use Illuminate\Database\Seeder;

class Mail_historiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_histories')->insert([
            'mail_id' => '1',
            'note' => 'note note note',
            'pengirim' => 1,
            'penerima' => 2,
        ]);

        DB::table('mail_histories')->insert([
            'mail_id' => '1',
            'note' => 'note note note',
            'pengirim' => 1,
            'penerima' => 1,
        ]);
    }
}
