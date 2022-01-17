<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    // The table associated to the model.
    protected $table = 'bands';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the videos associated to this band.
     * 
     * @return Collection
     */
    public function videos ()
    {
        return $this->belongsToMany(Video::class);
    }

    /**
     * Get the users associated to this band.
     * 
     * @return Collection
     */
    public function users ()
    {
        return $this->belongsToMany(User::class);
    }
}
