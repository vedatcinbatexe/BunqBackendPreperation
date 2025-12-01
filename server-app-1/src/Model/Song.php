<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    public $timestamps = false;

    protected $fillable = ['title', 'description', 'artist', 'listened_count'];
}
