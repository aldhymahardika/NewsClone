<?php

use Illuminate\Database\Seeder;

class VerifikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Verifikator',
        	'role' => 'verifikator',
        	'email' => 'verifikator@mail.com',
        	'password' => bcrypt('verifikator123'),
        	'remember_token' => str_random(60)
        ]);
    }
}
