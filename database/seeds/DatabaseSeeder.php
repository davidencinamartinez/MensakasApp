<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
  			[	'category_id' => 1,
  				'bus_name' => 'Burger King',
  				'bus_description' => '¿Tienes hambre? Tenemos lo que buscas!',
  				'address' => 'Carrer de Laureà Miró, 146',
  				'postal_code' => '08950'
  			],
  			[	'category_id' => 2,
  				'bus_name' => 'Naru Sushi',
  				'bus_description' => 'Repartimos sushi a domicilio en el Baix Llobregat, concretamente llegamos a Esplugues, Sant Just, Sant Boi, L’hospitalet, Sant Joan Despí y Cornellá. En este último además ofrecemos sushi para llevar. ¡Os esperamos!',
  				'address' => "Ctra. d'Esplugues, 71",
  				'postal_code' => '08940'
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

  		DB::table('items')->insert([
        	[	'bus_id' => 4,
        		'item_name' => 'Trío de quinoa eco',
        		'item_description' => '5 lechugas, brócoli, tomate seco, naranja vinagreta tamarindo, semillas y especias "zaatar".',
        		'item_price' => 10.70,
        		'item_status' => 1
        	],
        	[	'bus_id' => 2,
        		'item_name' => 'Tataki de atún con guacamole',
        		'item_description' => 'Tataki de atún con guacamole y reducción de vinagre de Módena con soja.',
        		'item_price' => 11.50,
        		'item_status' => 1
        	],
        	[	'bus_id' => 1,
        		'item_name' => 'Menú Crispy Chicken',
        		'item_description' => 'Pan, mayonesa, lechuga, tomate, carne de pollo empanado más complemento y bebida.',
        		'item_price' => 7.20,
        		'item_status' => 1
        	],
        	[	'bus_id' => 3,
        		'item_name' => 'Menú 6',
        		'item_description' => 'Bandeja de Kebab Mixto Grande',
        		'item_price' => 5.50,
        		'item_status' => 1
        	],
        ]);

        DB::table('extras')->insert([
          [ 'item_id' => 1,
            'extra_name' => 'Medallón de queso de cabra ECO',
            'extra_price' => 1.50,
          ],
          [ 'item_id' => 2,
            'extra_name' => 'Semillas de Chía',
            'extra_price' => 1.20,
          ],
          [ 'item_id' => 3,
            'extra_name' => 'Bacon',
            'extra_price' => 1.10,
          ],
          [ 'item_id' => 4,
            'extra_name' => 'Salchipapas',
            'extra_price' => 1.70,
          ],
        ]);

 		DB::table('orders')->insert([
 			[	'order_date' => Carbon::now()->format('Y-m-d H:i:s'),
 				'consumer_id' => 4,
 				'bus_id' => 1,
 				'items' => '[3]',
 				'extras' => '[3]',
 			],
 		]);

    }
}
