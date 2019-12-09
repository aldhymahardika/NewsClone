<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin',
        	'role' => 'admin',
        	'email' => 'admin@mail.com',
        	'password' => bcrypt('admin123'),
        	'remember_token' => str_random(60)
        ]);
    }
}
