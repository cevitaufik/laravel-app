<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $countainer = [];
        $users = User::with('posts')->get();

        foreach($users as $user) {
            $id = $user->id;
            $tmp = [];

            foreach($user->posts as $post) {
                if ($post->user_id == $id) {
                    array_push($tmp, $post->article);
                }
            }

            $tmp1 = [
                "id" => $id,
                "name" => $user->name,
                "numberOfArticles" => count($tmp),                
            ];            

            array_push($countainer, $tmp1);
        }

        return view('user/users', [
            "tittle" => "Users",
            "data" => $countainer,
        ]);
    }

    public function show(User $user)
    {
        return view('user/user-post', [
            "tittle" => $user->name,
            "data" => $user->posts,
            "name" => $user->name,
        ]);
    }
}
