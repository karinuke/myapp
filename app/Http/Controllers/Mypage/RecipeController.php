<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //
    public function add()
    {
        return view('mypage.recipe.create');
    }
    
}
