<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use App\Http\Requests\SaveAlbumRequest;
use App\User;
use Illuminate\Http\Request;

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
        \Auth::user()->album()->create($request->all());
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

        $albums = Album::all()->where('user_id', 'LIKE', $user->id);

        return view('album/show')
            ->with('user', $user)
            ->with('albums', $albums)
            /*->with('images', $images)*/;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        return view('album/create')->with('user', $this_user)->with('title', 'Vytvoriť album');
    }
}
