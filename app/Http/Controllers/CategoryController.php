<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use App\Http\Requests\SaveCategoryRequest;
use App\User;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create($user)
    {

        $this_user = User::findOrFail($user);
        $this->authorize('edit-portfolio', $this_user);
        return view('category/create')->with('user', $this_user)->with('title', 'Vytvoriť kategóriu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveCategoryRequest $request)
    {
        \Auth::user()->category()->create($request->all());
        return redirect()->route('user.album.index', \Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($user_id, $category_id)
    {
        $user = User::query()->findOrFail($user_id);
        $categories = Category::all()->where('user_id', 'LIKE', $user->id);
        $spec_category = Category::query()->findOrFail($category_id);
        $albums = $spec_category->albums->where('user_id', 'LIKE', $user->id);

//        $albums->categories;

        return view('album')
            ->with('user', $user)
            ->with('categories', $categories)
            ->with('spec_category', $spec_category)
            ->with('albums', $albums);

    }

    /**
     * Show the form for delete the specified resource.
     *
     * @param $user
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete($user, $id)
    {
        $user = User::findOrFail($user);
        $this->authorize('edit-portfolio', $user);
        $this->authorize('edit-category', Category::findOrFail($id));

        $category = Category::findOrFail($id);

        return view('category/delete')->with('user', $user)->with('category',$category)->with('title','Zmazať kategóriu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($user, $id)
    {
        $user = User::findOrFail($user);
        $this->authorize('edit-portfolio', $user);
        $this->authorize('edit-category', Category::findOrFail($id));

        $category = Category::findOrFail($id);

        return view('category/edit')->with('user', $user)->with('category',$category)->with('title','Upraviť kategóriu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveCategoryRequest $request
     * @param $user
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveCategoryRequest $request,$user, $category)
    {
        $this_category = Category::findOrFail($category);
        $this_category->update($request->all());
        return redirect()->route('user.album.index', \Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @param $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($user, $category)
    {
        $this_category = Category::findOrFail($category);
        $this_category->delete();
        Session::flash('message', 'Úspešne vymazaná kategória');
        return redirect()->route('user.album.index', \Auth::id());
    }
}
