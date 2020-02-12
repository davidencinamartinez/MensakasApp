<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
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
				'role' => 4,
				'location' => null
			],
			[	'first_name' => 'Paco',
				'last_name' => 'Cayuela',
				'email' => 'pacocayuela13@gmail.com',
				'password' => Hash::make('P@ssw0rd'),	
				'role' => 4,
				'location' => null
			],
			[
				'first_name' => 'Miquel',
				'last_name' => 'Quintana',
				'email' => 'mikeblack@gmail.com',
				'password' => Hash::make('P@ssw0rd'),
				'role' => 3,
				'location' => null
			],
			[
				'first_name' => 'Esther',
				'last_name' => 'Martí',
				'email' => 'emart92@gmail.com',
				'password' => Hash::make('P@ssw0rd'),
				'role' => 1,
				'location' => null
			],
			[
				'first_name' => 'Pepe',
				'last_name' => 'Forés',
				'email' => 'pepe1990@gmail.com',
				'password' => Hash::make('P@ssw0rd'),
				'role' => 2,
				'location' => '41.374281, 2.085636'
			],
		]);

		DB::table('categories')->insert([
 			[	'name' => 'Fast Food'	],
 			[	'name' => 'Sushi'	],
 			[	'name' => 'Italiano'	],
 			[	'name' => 'Kebab'	],
 			[	'name' => 'Healthy'	],
 		]);

 		DB::table('businesses')->insert([
  			[	'category_id' => 2,
  				'bus_name' => 'Naru Sushi',
  				'bus_description' => 'Repartimos sushi a domicilio en el Baix Llobregat, concretamente llegamos a Esplugues, Sant Just, Sant Boi, L’hospitalet, Sant Joan Despí y Cornellá. En este último además ofrecemos sushi para llevar. ¡Os esperamos!',
  				'address' => "Ctra. d'Esplugues, 71",
  				'postal_code' => '08940'
  			],
  			[	'category_id' => 1,
  				'bus_name' => 'Burger King',
  				'bus_description' => '¿Tienes hambre? Tenemos lo que buscas!',
  				'address' => 'Carrer de Laureà Miró, 146',
  				'postal_code' => '08950'
  			],
  			[	'category_id' => 4,
  				'bus_name' => 'Pita Kebab',
  				'bus_description' => 'Kebabs, pizzas... Todo esto y mucho más es lo encontrarás en pita kebab. ¿Te vas a resistir?',
  				'address' => 'Carrer de les Llunetes, 7',
  				'postal_code' => '08940'
  			],
  			[	'category_id' => 5,
  				'bus_name' => 'Greenvita Healthy Kitchen',
  				'bus_description' => 'Alimentación más sana, equilibrada y natural. De agricultura responsable, con nutrientes y vitaminas esenciales. Con humildad, naturalidad y buenas maneras. Bueno para el paladar y para el cuerpo.',
  				'address' => 'Carreterta de la Vila, 90',
  				'postal_code' => '08840'
  			],
  		]);


    }
}
