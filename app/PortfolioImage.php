<?php

namespace App;

use App\Http\Requests\PortfolioImageRequest;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function saveFile($user, $file, PortfolioImageRequest $request)
    {
//        create file
        $filepath = public_path('img/portfolio/' . $user);
        $extension = $file->getClientOriginalExtension();

        $filename = str_replace(
            ".$extension",
            "-" . rand(11111, 99999) . ".$extension",
            $file->getClientOriginalName()
        );
//          Save file
        $file->move($filepath, $filename);


//        store file in db
        return PortfolioImage::create([
            'user_id' => $user,
            'name' => $file->getClientOriginalName(),
            'filename' => $filename,
            'mime' => $file->getClientMimeType(),
            'ext' => $extension,
            'name_by_user' => $request->request->get('name_by_user'),
            'description' => $request->request->get('description'),
        ]);
    }
}
