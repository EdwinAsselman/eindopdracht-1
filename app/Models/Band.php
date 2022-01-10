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

    public function videos ()
    {
        return $this->belongsToMany(Video::class, 'band_video', 'band_id', 'youtube_video_id');
    }
}
