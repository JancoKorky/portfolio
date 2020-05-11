<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use App\Http\Requests\SaveImageRequest;
use App\Image;
use App\User;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($user,$album)
    {
        $this_user = User::findOrFail($user);
        $this->authorize('edit-portfolio', $this_user);
        $this->authorize('edit-album', Album::findOrFail($album));
        $this_album = Album::query()->findOrFail($album);

        return view('image/create')
            ->with('user', $this_user)
            ->with('album', $this_album)
            ->with('title', 'Pridať obrázky');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveImageRequest $request
     * @param $user
     * @param $album
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveImageRequest $request, $user, $album)
    {
        Album::query()->findOrFail($album);
        $this_user = User::query()->findOrFail($user);

        $this->authorize('edit-album', Album::findOrFail($album));
        $this->authorize('edit-portfolio', $this_user);

        $this->uploadFiles($album, $request->file('images'));

        return redirect()->route('user.album.show', [$user, $album]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($user_id, $album_id, $image_id)
    {
        $this->authorize('edit-album', Album::findOrFail($album_id));
        $this->authorize('edit-portfolio', User::findOrFail($user_id));

        $image = Image::query()->findOrFail($image_id);
        $filepath = public_path('img/albums/' . $album_id . '/' . $image->filename);
        unlink($filepath);
        $image->delete();

        return redirect()->route('user.album.show', [$user_id, $album_id]);
    }

    /**
     * @param $album
     * @param $files
     */
    private function uploadFiles($album, $files)
    {
        if ($files) foreach ($files as $file){
            if (!$file || !$file->isValid()) continue;

            Image::saveFile($album, $file);

            /*$filepath = storage_path('albums/'. $album);
            $extension = $file->getClientOriginalExtension();

            $filename = str_replace(
                ".$extension",
                "-". rand(11111, 99999) . ".$extension",
                $file->getClientOriginalName()
            );

            $file->move($filepath, $filename);

            Image::create([
                'album_id' => $album,
                'name' => $file->getClientOriginalName(),
                'filename' => $filename,
                'mime' => $extension
            ]);*/
        }
    }
}
