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

      DB::table('locations')->insert([
        [ 'name' => 'Abrera',
          'postal_code' => '08630'
        ],
        [ 'name' => 'Begas',
          'postal_code' => '08859',
        ],
        [ 'name' => 'Casteldefels',
          'postal_code' => '08860',
        ],
        [ 'name' => 'Castellví de Rosanes',
          'postal_code' => '08769',
        ],
        [ 'name' => 'Cervelló',
          'postal_code' => '08758'
        ],
        [ 'name' => 'Collbató',
          'postal_code' => '08293'
        ],
        [ 'name' => 'Corbera de Llobregat',
          'postal_code' => '08757'
        ],
        [ 'name' => 'Cornellá de Llobregat',
          'postal_code' => '08940'
        ],
        [ 'name' => 'El Prat de Llobregat',
          'postal_code' => '08820'
        ],
        [ 'name' => 'Esparraguera',
          'postal_code' => '08292'
        ],
        [ 'name' => 'Esplugas de Llobregat',
          'postal_code' => '08950'
        ],
        [ 'name' => 'Gavá',
          'postal_code' => '08850'
        ],
        [ 'name' => 'Martorell',
          'postal_code' => '08760'
        ],
        [ 'name' => 'Molins de Rey',
          'postal_code' => '08750'
        ],
        [ 'name' => 'Olesa de Montserrat',
          'postal_code' => '08640'
        ],
        [ 'name' => 'Pallejá',
          'postal_code' => '08780'
        ],
        [ 'name' => 'La Palma de Cervelló',
          'postal_code' => '08756'
        ],
        [ 'name' => 'El Papiol',
          'postal_code' => '08754'
        ],
        [ 'name' => 'Santa Coloma de Cervelló',
          'postal_code' => '08690'
        ],
        [ 'name' => 'San Andrés de la Barca',
          'postal_code' => '08740'
        ],
        [ 'name' => 'San Baudilio de Llobregat',
          'postal_code' => '08830'
        ],
        [ 'name' => 'San Clemente de Llobregat',
          'postal_code' => '08849'
        ],
        [ 'name' => 'San Esteban de Sasroviras',
          'postal_code' => '08635'
        ],
        [ 'name' => 'San Feliú de Llobregat',
          'postal_code' => '08980'
        ],
        [ 'name' => 'San Juan Despí',
          'postal_code' => '08970'
        ],
        [ 'name' => 'San Justo Desvern',
          'postal_code' => '08960'
        ],
        [ 'name' => 'San Vicente dels Horts',
          'postal_code' => '08620'
        ],
        [ 'name' => 'Torrellas de Llobregat',
          'postal_code' => '08629'
        ],
        [ 'name' => 'Vallirana',
          'postal_code' => '08759'
        ],
        [ 'name' => 'Viladecans',
          'postal_code' => '08840'
        ],
      ]);

   		DB::table('businesses')->insert([
    			[	'category_id' => 1,
    				'bus_name' => 'Burger King',
    				'bus_description' => '¿Tienes hambre? Tenemos lo que buscas!',
    				'address' => 'Carrer de Laureà Miró, 146',
            'location_id' => 11,
            'opening_schedule' => '11:30:00',
            'closing_schedule' => '01:00:00',
    			],
    			[	'category_id' => 2,
    				'bus_name' => 'Naru Sushi',
    				'bus_description' => 'Repartimos sushi a domicilio en el Baix Llobregat, concretamente llegamos a Esplugues, Sant Just, Sant Boi, L’hospitalet, Sant Joan Despí y Cornellá. En este último además ofrecemos sushi para llevar. ¡Os esperamos!',
    				'address' => "Ctra. d'Esplugues, 71",
    				'location_id' => 8,
            'opening_schedule' => '12:30:00',
            'closing_schedule' => '15:30:00',
    			],
    			[	'category_id' => 4,
    				'bus_name' => 'Pita Kebab',
    				'bus_description' => 'Kebabs, pizzas... Todo esto y mucho más es lo encontrarás en pita kebab. ¿Te vas a resistir?',
    				'address' => 'Carrer de les Llunetes, 7',
    				'location_id' => 8,
            'opening_schedule' => '12:00:00',
            'closing_schedule' => '24:00:00',
    			],
    			[	'category_id' => 5,
    				'bus_name' => 'Greenvita Healthy Kitchen',
    				'bus_description' => 'Alimentación más sana, equilibrada y natural. De agricultura responsable, con nutrientes y vitaminas esenciales. Con humildad, naturalidad y buenas maneras. Bueno para el paladar y para el cuerpo.',
    				'address' => 'Carretera de la Vila, 90',
    				'location_id' => 8,
            'opening_schedule' => '11:00:00',
            'closing_schedule' => '23:30:00',
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
          [ 'bus_id' => 1,
            'item_name' => 'Menú Grand Whiskey BBQ',
            'item_description' => 'La famosa Grand Whiskey BBQ está de vuelta. La combinación de carne a la parrilla, salsa Whiskey BBQ y delicioso queso de cabra la hacen insuperable. Y además, con cebolla crujiente, bacon y tomate recién cortado entre pan de cerveza.',
            'item_price' => 9.20,
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

      DB::table('order_items')->insert([
        [ 'order_id' => 1,
          'item_id' => 3,
        ],
        [ 'order_id' => 1,
          'item_id' => 3,
        ],
        [ 'order_id' => 2,
          'item_id' => 2,
        ],
      ]);

      DB::table('order_extras')->insert([
        [ 'order_id' => 1,
          'extra_id' => 3,
        ],
        [ 'order_id' => 1,
          'extra_id' => 3,
        ],
      ]);

   		DB::table('orders')->insert([
   			[	'order_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '16/02/2020 20:32:45'),
   				'consumer_id' => 4,
   				'bus_id' => 1,
          'order_total' => 15.50,
          'order_status' => 5,
          'pickup_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '16/02/2020 20:32:45')->addMinutes(15),
          'delivery_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '16/02/2020 20:32:45')->addMinutes(32),
          'comments' => 'Preguntar por Gabriel Fernández',
   			],
        [ 'order_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/02/2020 14:15:20'),
          'consumer_id' => 4,
          'bus_id' => 2,
          'order_total' => 11.50,
          'order_status' => 5,
          'pickup_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/02/2020 14:15:20')->addMinutes(22),
          'delivery_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/02/2020 14:15:20')->addMinutes(38),
          'comments' => null
        ],
   		]);

      
    }
}
