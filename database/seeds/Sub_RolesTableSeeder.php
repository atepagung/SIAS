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
        DB::table('sub_roles')->insert([
        	'id' => '1',
            'title' => 'No Role',
            'role_id' => '1',
        ]);

        DB::table('sub_roles')->insert([
        	'id' => '2',
            'title' => 'Administrator',
            'role_id' => '2',
        ]);
    }
}
