<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->latest('id')
            ->limit(10)
            ->get();

        return view('home', compact('posts'));
    }
}
