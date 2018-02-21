<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username' => 'administrator',
        	'password' => bcrypt('admin'),
            'name' => 'Admin',
            'sub_role_id' => '2',
        ]);

        DB::table('users')->insert([
            'username' => 'user1',
            'password' => bcrypt('user1'),
            'name' => 'user1',
            'sub_role_id' => '1',
        ]);
    }
}
