<?php

use Illuminate\Database\Seeder;

class MailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mails')->insert([
        	'id' => 1,
            'from' => '1',
            'subject' => 'Testing Mail',
            'mail_category_id' => 1
        ]);
    }
}
