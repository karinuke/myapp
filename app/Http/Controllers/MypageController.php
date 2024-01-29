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
        
        //$menus = Menu::find(1);
        $menus = Menu::orderBy('created_at', 'desc')->first();
        
        $maindish = Recipe::find($menus->maindish);
        $sidedish = Recipe::find($menus->sidedish);
        $soup = Recipe::find($menus->soup);
        
        return view(('mypage.index'), ['posts' => $posts, 'menus'=>$menus, 'maindish'=>$maindish, 'sidedish'=>$sidedish, 'soup'=>$soup]);
    }

}
