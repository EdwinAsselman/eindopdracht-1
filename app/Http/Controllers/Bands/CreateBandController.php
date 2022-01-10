<?php

namespace App\Http\Controllers\Bands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateBandController extends Controller
{
    /**
     * Render the form view for bands.
     * 
     * @return Illuminate\Http\View
     */
    public function render ()
    {
        return view('pages.bands.form');
    }
}
