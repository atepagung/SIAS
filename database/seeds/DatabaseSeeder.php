<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(Sub_RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(File_CategoriesTableSeeder::class);
        $this->call(Ket_Surat_KeluarTableSeeder::class);
    }
}
