<?php

namespace App\Queries\Bands;

use App\Models\Band;

abstract class BandsCollection
{
    /**
     * Get all bands.
     * 
     * @return Collection
     */
    public static function get (array $attributes)
    {
        return Band::query()
            ->when($attributes['search'], function($query, $search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            
            ->orderBy('name', 'asc');
    }
}
