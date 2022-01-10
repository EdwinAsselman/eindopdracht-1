<?php

namespace App\Http\Controllers\Bands;

use App\Http\Controllers\Controller;
use App\Models\Band;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Render the form view for bands.
     * 
     * @return Illuminate\Http\View
     */
    public function render ($bandId = null)
    {
        // Get band by its given id.
        $band = $this->getBand($bandId);

        return view('pages.bands.details')
            ->with('band', $band);
    }

    /**
     * Get band by it's given id.
     * 
     * @return Collection
     */
    private function getBand ($bandId)
    {   
        /**
         * Try to find the band by its given id.
         * If id has been given, but no band found, abort mission.
         * If no id has been given, return to the create version of the form view.
         */
        try {

            $band = Band::findOrFail($bandId);
        } catch (ModelNotFoundException $err) {
                
            abort(404);
        }

        return $band;
    }
}
