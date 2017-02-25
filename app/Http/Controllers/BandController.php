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
				return "<a href='".action('BandController@edit', ['id' => $band->id])."'><i class='fa fa-fw fa-pencil'</a>";
			})
			->addColumn('delete', function($band){
				return "<a href='#' class='delete-band' data-pk='$band->id'><i class='fa fa-fw fa-trash'</a>";
			})
			->editColumn('website', function($band){
				return "<a href='$band->website'>$band->website</a>";
			})
			->rawColumns(['edit', 'delete', 'website'])
			->make(true);
    }
	
	/**
	 * Deletes an album.
	 * 
	 * @param $id
	 */
	public function delete($id)
	{
		$band = Band::findOrFail($id);
		
		foreach($band->albums as $album){
			$album->delete();
		}
		
		$band->delete();
    }
	
	public function edit($id)
	{
		$band = Band::findOrFail($id);
		
		return view('band.edit', compact('band'));
	}
	
	public function update($id, Request $request)
	{
		$band = Band::findOrFail($id);
		
		$band->update($request->except('_token'));
		
		return redirect('/');
	}
}
