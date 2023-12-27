<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Menu;

class MypageController extends Controller
{
    //
    public function index(Request $request)
    {
        
        $posts = Recipe::orderBy('id','desc')->take(3)->get();
        
        //$menus = Menu::with('recipe')->get();
        
        $menus = Menu::find(1)->recipe->title;
        
        return view(('mypage.index'), ['posts' => $posts, 'menus'=>$menus]);
    }
    
}
