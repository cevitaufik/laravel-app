<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $container = [];
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

            array_push($container, $tmp1);
        }

        return view('user/users', [
            "tittle" => "Users",
            "data" => $container,
        ]);
    }

    public function show(User $user)
    {
        return view('post/posts', [
            "tittle" => $user->name,
            "data" => $user->posts,
            "header" => $user->name,
        ]);
    }

    public function login() {
        return view('user/login', [
            "tittle" => "Login"
        ]);
    }

    public function register() {
        return view('user/register', [
            "tittle" => "Registration"
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "username" => ["required", "min:4", "max:255", "unique:users"],
            "email" => ["required", "email:dns", "unique:users"],
            "password" => ["required", "min:5", "max:255"]
        ]);

        $validatedData["password"] = Hash::make($validatedData["password"]);
        User::create($validatedData);
        // $request->session()->flash("success", "Registration successfull");
        return redirect("/login")->with("success", "Registration successfull");
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "email" => ["required", "email:dns"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        
        return back()->with("loginError", "login failed");
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
