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
	 * Renders the create band page.
	 * 
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$band = new Band;
		
		return view('band.create', compact('band'));
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
	
	/**
	 * Renders the band edit page.
	 * 
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$band = Band::findOrFail($id);
		
		return view('band.edit', compact('band'));
	}
	
	/**
	 * Validates and stores a new band.
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Request $request)
	{
		$band = new Band;
		
		$this->validate($request, $band->rules);
		
		$band->fill($request->except('_token'));
		$band->save();
		
		return redirect('/');
	}
	
	/**
	 * Validates input and updates the band.
	 * 
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update($id, Request $request)
	{
		$band = Band::findOrFail($id);
		
		$this->validate($request, $band->rules);
		
		$band->update($request->except('_token'));
		
		return redirect('/');
	}
}
