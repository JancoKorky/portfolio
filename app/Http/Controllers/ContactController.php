<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show($user_id) {
        $user = User::query()->findOrFail($user_id);
        return view('contact/show')->with('user', $user);
    }
}
