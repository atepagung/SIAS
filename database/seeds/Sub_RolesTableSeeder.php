<?php

use Illuminate\Database\Seeder;

class Sub_RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Sub_role::create([
        	'id' => '1',
            'title' => 'No Role',
            'role_id' => '1',
        ]);

        \App\Sub_role::create([
        	'id' => '2',
            'title' => 'Administrator',
            'role_id' => '2',
        ]);
    }
}
