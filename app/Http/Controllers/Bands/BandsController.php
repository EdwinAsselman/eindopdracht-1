<?php

namespace App\Http\Controllers\Bands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BandsController extends Controller
{
    /**
     * Render the list view for bands.
     * 
     * @return Illuminate\Http\View
     */
    public function render ()
    {
        return view('pages.bands.list');
    }
}
