<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user/users', [
            "tittle" => "users",
            "data" => User::all()
        ]);
    }

    public function show(User $user)
    {
        return view('user/user-post', [
            "tittle" => $user->name,
            "data" => $user->posts,
            "name" => $user->name
        ]);
    }
}
