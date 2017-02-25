<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AlbumController extends Controller
{
	/**
	 * Gets albums and prepares them for use in a Datatable.
	 */
	public function ajaxGetAlbums()
    {
	    $albums = Album::all();
	    
	    return Datatables::of($albums)->make(true);
    }
}
