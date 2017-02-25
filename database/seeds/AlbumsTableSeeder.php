<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    // Foo Fighters
	    $fooFightersID = DB::table('bands')->where('name', 'Foo Fighters')->pluck('id');
	    DB::table('albums')->insert([
        	'band_id' => $fooFightersID[0],
	        'name' => 'The Colour and the Shape',
	        'recorded_date' => '1997-02-01',
	        'release_date' => '1997-05-20',
	        'number_of_tracks' => 13,
	        'label' => 'Roswell/Capitol',
	        'producer' => 'Gil Norton',
	        'genre' => 'Rock',
        ]);
	
	    DB::table('albums')->insert([
		    'band_id' => $fooFightersID[0],
		    'name' => 'Sonic Highways',
		    'recorded_date' => '2014-07-01',
		    'release_date' => '2014-11-10',
		    'number_of_tracks' => 8,
		    'label' => 'Roswell, RCA',
		    'producer' => 'Butch Vig',
		    'genre' => 'Rock',
	    ]);
	
	    // The Black Keys
	    $blackKeysID = DB::table('bands')->where('name', 'The Black Keys')->pluck('id');
	    DB::table('albums')->insert([
		    'band_id' => $blackKeysID[0],
		    'name' => 'The Big Come Up',
		    'recorded_date' => '2002-03-01',
		    'release_date' => '2002-05-14',
		    'number_of_tracks' => 13,
		    'label' => 'Alive',
		    'producer' => 'Patrick Carney',
		    'genre' => 'Rock',
	    ]);
	
	    DB::table('albums')->insert([
		    'band_id' => $blackKeysID[0],
		    'name' => 'El Camino',
		    'recorded_date' => '2011-05-01',
		    'release_date' => '2011-12-06',
		    'number_of_tracks' => 8,
		    'label' => 'Nonesuck',
		    'producer' => 'Danger Mouse',
		    'genre' => 'Rock',
	    ]);
	
	    // Led Zeppelin
	    $ledZeppelinID = DB::table('bands')->where('name', 'Led Zeppelin')->pluck('id');
	    DB::table('albums')->insert([
		    'band_id' => $ledZeppelinID[0],
		    'name' => 'Houses of the Holy',
		    'recorded_date' => '1972-08-01',
		    'release_date' => '1973-03-28',
		    'number_of_tracks' => 8,
		    'label' => 'Atlantic',
		    'producer' => 'Jimmy Page',
		    'genre' => 'Rock',
	    ]);
	
	    DB::table('albums')->insert([
		    'band_id' => $ledZeppelinID[0],
		    'name' => 'Physical Grafitti',
		    'recorded_date' => '1974-02-01',
		    'release_date' => '1975-02-24',
		    'number_of_tracks' => 15,
		    'label' => 'Swan Song',
		    'producer' => 'Jimmy Page',
		    'genre' => 'Rock',
	    ]);
    }
}
