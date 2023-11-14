<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Recipe extends Controller
{
    //
    public function index(Request $request)
    {
        return view('recipe.index');
    }
}
