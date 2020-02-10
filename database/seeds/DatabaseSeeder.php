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
				'name' => 'David',
				'email' => 'dencina1996@gmail.com',
				'password' => Hash::make('P@ssw0rd'),
			],
			[	'name' => 'Paco',
				'email' => 'pacocayuela13@gmail.com',
				'password' => Hash::make('P@ssw0rd'),	
			]
		]);
    }
}
