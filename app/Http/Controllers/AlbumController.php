<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use App\Http\Requests\SaveAlbumRequest;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($user)
    {
        $user = User::query()->findOrFail($user);
        $categories = Category::all()->where('user_id', 'LIKE', $user->id);
        $albums = Album::all()->where('user_id', 'LIKE', $user->id);
        /*foreach ($albums as $album) {
            $image = $album->image()->first();
            dump($image);
        }
        die();*/


        return view('album')
            ->with('user', $user)
            ->with('categories', $categories)
            ->with('albums', $albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveAlbumRequest $request)
    {
        $album = \Auth::user()->album()->create($request->all());
        $album->categories()->sync($request->get('$categories'));

        return redirect()->route('user.album.index', \Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param $user_id
     * @param $album_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($user_id, $album_id)
    {
        $user = User::query()->findOrFail($user_id);

//        $albums = Album::all()->where('user_id', 'LIKE', $user->id);
        $this_album = Album::query()->findOrFail($album_id);

        return view('album/show')
            ->with('user', $user)
            ->with('this_album', $this_album)
            ->with('images', $this_album->image);
    }


    /**
     * Display the specified resource in edit.
     *
     * @param $user_id
     * @param $album_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($user_id, $album_id)
    {
        $user = User::findOrFail($user_id);
        $this->authorize('edit-portfolio', $user);
        $album = Album::findOrFail($album_id);
        $album->categories;
        $this->authorize('edit-album', $album);
        $categories = Category::all()->where('user_id', 'LIKE', $user->id);

        return view('album/edit')
            ->with('user', $user)
            ->with('album',$album)
            ->with('title','Upraviť album')
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $user_id
     * @param $album_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $user_id, $album_id)
    {
        $album = Album::findOrFail($album_id);
        $album->update($request->all());
        $album->categories()->sync($request->get('$categories'));
        return redirect()->route('user.album.index', \Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($user_id, $album_id)
    {

        $this->authorize('edit-album', Album::findOrFail($album_id));
        $this->authorize('edit-portfolio', User::findOrFail($user_id));
        $album = Album::query()->findOrFail($album_id);
        $filepath = public_path('img/albums/' . $album_id);
        File::deleteDirectory($filepath);
        $album->delete();

        return redirect()->route('user.album.index', $user_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create($user)
    {
        $this_user = User::findOrFail($user);
        $this->authorize('edit-portfolio', $this_user);

        $categories = Category::all()->where('user_id', 'LIKE', $this_user->id);

        return view('album/create')
            ->with('user', $this_user)
            ->with('title', 'Vytvoriť album')
            ->with('categories', $categories);
    }
}
