<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    public $timestamps = false;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'youtube_videos';

    public function bands ()
    {
        return $this->belongsToMany(Band::class, 'band_video', 'youtube_video_id', 'band_id');
    }
}
