<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

		DB::table('users')->insert([
			[
				'first_name' => 'David',
				'last_name' => 'Encina',
				'email' => 'dencina1996@gmail.com',
				'password' => Hash::make('P@ssw0rd'),
				'role' => 4
			],
			[	'first_name' => 'Paco',
				'last_name' => 'Cayuela',
				'email' => 'pacocayuela13@gmail.com',
				'password' => Hash::make('P@ssw0rd'),	
				'role' => 4
			]
		]);
    }
}
