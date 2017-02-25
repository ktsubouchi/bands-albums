<?php

namespace App\Http\Controllers;

use App\Album;
use App\Band;
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
	    
	    return Datatables::of($albums)
		    ->addColumn('edit', function($album){
			    return "<a href='".action('AlbumController@edit', ['id' => $album->id])."'><i class='fa fa-pencil'></i></a>";
		    })
		    ->addColumn('delete', function($album){
			    return "<a href='#' class='delete-album' data-pk='$album->id'><i class='fa fa-trash'></i></a>";
		    })
		    ->editColumn('band_id', function($album){
			    return $album->band->name;
		    })
		    ->rawColumns(['edit', 'delete'])
		    ->make(true);
    }
	
	/**
	 * Renders the album create page.
	 * 
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$album = new Album;
		$bandSelectData = Band::all()->pluck('name', 'id');
		
		return view('album.create', compact('album', 'bandSelectData'));
    }
	
	/**
	 * Deletes an album.
	 * 
	 * @param $id
	 */
	public function delete($id)
	{
		Album::destroy($id);
    }
	
	/**
	 * Renders the edit page for an album.
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$album = Album::findOrFail($id);
		$bandSelectData = Band::all()->pluck('name', 'id');
		
		return view('album.edit', compact('album', 'bandSelectData'));
    }
	
	/**
	 * Validates and creates and album.
	 * 
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Request $request)
	{
		$album = new Album;
		
		$this->validate($request, $album->rules);
		
		$album->fill($request->except('_token'));
		$album->save();
		
		return redirect('albums');
    }
	
	/**
	 * Validates and updates an album.
	 *
	 * @param         $id
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update($id, Request $request)
	{
		$album = Album::findOrFail($id);
		
		$this->validate($request, $album->rules);
		
		$album->update($request->except('_token'));
		
		return redirect('albums');
    }
}
