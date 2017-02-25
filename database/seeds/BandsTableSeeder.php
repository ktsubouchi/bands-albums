<?php

use Illuminate\Database\Seeder;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
        	'name' => 'Foo Fighters',
	        'start_date' => '1995-02-23',
	        'website' => 'https://foofighters.com/',
	        'still_active' => true,
        ]);
	
	    DB::table('bands')->insert([
		    'name' => 'The Black Keys',
		    'start_date' => '2002-05-14',
		    'website' => 'https://theblackkeys.com/',
		    'still_active' => true,
	    ]);
	
	    DB::table('bands')->insert([
		    'name' => 'Led Zeppelin',
		    'start_date' => '1969-01-12',
		    'website' => 'http://www.ledzeppelin.com/',
		    'still_active' => false,
	    ]);
    }
}
