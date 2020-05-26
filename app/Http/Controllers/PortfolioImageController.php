<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioImageRequest;
use App\Http\Requests\SaveImageRequest;
use App\Image;
use App\PortfolioImage;
use App\User;
use Illuminate\Http\Request;

class PortfolioImageController extends Controller
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

        return view('user/create')
            ->with('user', $this_user)
            ->with('title', 'Pridať obrázok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveImageRequest $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(PortfolioImageRequest $request, $user)
    {
        $this_user = User::query()->findOrFail($user);

        $this->authorize('edit-portfolio', $this_user);
        $this->uploadFiles($this_user->id, $request);
//        $this->uploadFiles($this_user->id, $request->file('image'));

        return redirect()->route('user.show', $this_user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($user_id, $image_id)
    {
        $this_user = User::query()->findOrFail($user_id);
        $this->authorize('edit-portfolio', $this_user);
        $image = PortfolioImage::query()->findOrFail($image_id);
        $this->authorize('edit-image-portfolio', $image);

        return view('portfolio/edit')
            ->with('user', $this_user)
            ->with('portfolioImage', $image)
            ->with('title', 'Upraviť texty obrázka');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $user_id
     * @param $image_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(PortfolioImageRequest $request, $user_id, $image_id)
    {
        $this_user = User::query()->findOrFail($user_id);
        $this->authorize('edit-portfolio', $this_user);
        $image = PortfolioImage::query()->findOrFail($image_id);
        $this->authorize('edit-image-portfolio', $image);


        $image->update($request->all());

        return redirect()->route('user.show', $user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user_id
     * @param $image_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($user_id, $image_id)
    {
        $this->authorize('edit-portfolio', User::findOrFail($user_id));
        $image = PortfolioImage::query()->findOrFail($image_id);
        $this->authorize('edit-image-portfolio', $image);

        $filepath = public_path('img/portfolio/' . $user_id . '/' . $image->filename);

        if (\File::exists($filepath)) {
            unlink($filepath);
        }

        $image->delete();
        return redirect()->route('user.show', $user_id);
    }

    /**
     * @param $user
     * @param PortfolioImageRequest $request
     */
    private function uploadFiles($user, PortfolioImageRequest $request)
    {
        $file = $request->file('image');

        if ($file || $file->isValid()) {
            PortfolioImage::saveFile($user, $file, $request);
        }


    }
}
