<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
//    protected $fillable = ['album_name', 'user_id'];

    public $timestamps = false;
    //

    public function user()
    {
        return $this->belongsTo(Album::class);
    }
}
