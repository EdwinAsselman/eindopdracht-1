<?php

namespace App\Queries\Users;

use App\Models\User;

abstract class UsersCollection
{
    /**
     * Get all users.
     * 
     * @return Collection
     */
    public static function get (array $attributes)
    {
        return User::query()
            ->when($attributes['search'], function($query, $search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            
            ->orderBy('name', 'asc');
    }
}
