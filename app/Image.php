<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    //

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public static function saveFile($album, $file)
    {
//        create file
        $filepath = public_path('img/albums/' . $album);
        $extension = $file->getClientOriginalExtension();

        $filename = str_replace(
            ".$extension",
            "-" . rand(11111, 99999) . ".$extension",
            $file->getClientOriginalName()
        );
//          Save file
        $file->move($filepath, $filename);

//        store file in db
        return Image::create([
            'album_id' => $album,
            'name' => $file->getClientOriginalName(),
            'filename' => $filename,
            'mime' => $file->getClientMimeType(),
            'ext' => $extension
        ]);
    }


}
