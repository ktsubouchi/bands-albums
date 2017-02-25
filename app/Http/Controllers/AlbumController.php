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
	    
	    return Datatables::of($albums)
		    ->addColumn('edit', function($album){
			    return "<a href=''><i class='fa fa-pencil'></i></a>";
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
	 * Deletes an album.
	 * 
	 * @param $id
	 */
	public function delete($id)
	{
		Album::destroy($id);
    }
}
