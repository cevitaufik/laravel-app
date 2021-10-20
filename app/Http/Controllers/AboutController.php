<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        return view('about', [
            "tittle" => "About",
            "name" => "Laravel App",
            "date" => "19 Oktober 2021",
            "no" => 1,
        ]);
    }
}
