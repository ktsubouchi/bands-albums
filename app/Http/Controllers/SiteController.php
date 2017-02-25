<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
	/**
	 * Renders the home page.
	 * 
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
    {
	    return view('index');
    }
	
	/**
	 * Renders the albums page.
	 */
	public function albums()
	{
		return view('albums');
    }
}
