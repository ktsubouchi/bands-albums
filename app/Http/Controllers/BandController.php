<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BandController extends Controller
{
	/**
	 * Gets all bands and prepares them for use with a Datatable.
	 * 
	 * @return mixed
	 */
	public function ajaxGetBands()
	{
		$bands = Band::all();
		
		return Datatables::of($bands)->make(true);
    }
}
