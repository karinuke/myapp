<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

class MypageController extends Controller
{
    //
    public function index(Request $request)
    {
        
        $posts = Recipe::orderBy('id','desc')->take(3)->get();
        
        return view(('mypage.index'), ['posts' => $posts]);
    }
}
