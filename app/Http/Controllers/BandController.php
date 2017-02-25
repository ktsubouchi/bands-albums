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
		
		return Datatables::of($bands)
			->addColumn('edit', function($band){
				return "<a href='' ><i class='fa fa-fw fa-pencil'</a>";
			})
			->addColumn('delete', function($band){
				return "<a href='' ><i class='fa fa-fw fa-trash'</a>";
			})
			->editColumn('website', function($band){
				return "<a href='$band->website'>$band->website</a>";
			})
			->rawColumns(['edit', 'delete', 'website'])
			->make(true);
    }
}
