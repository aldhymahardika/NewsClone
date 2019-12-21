<?php

use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Operator',
        	'role' => 'operator',
        	'email' => 'operator@mail.com',
        	'password' => bcrypt('operator123'),
        	'remember_token' => str_random(60)
        ]);
    }
}
