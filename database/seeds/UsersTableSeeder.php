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
		    'name' => 'anar',
		    'email' => 'anar@example.com',
		    'password' => bcrypt('anar123')
		    ]);
    	    DB::table('users')->insert([
		    'name' => 'mmur',
		    'email' => 'mmur@example.com',
		    'password' => bcrypt('mmur123')
		    ]);
    }
}
