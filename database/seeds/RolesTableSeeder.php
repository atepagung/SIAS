<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
        	'id' => '1',
            'title' => 'No Role',
        ]);

        \App\Role::create([
        	'id' => '2',
            'title' => 'Administrator',
        ]);
    }
}
