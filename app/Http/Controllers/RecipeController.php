<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\User;

class RecipeController extends Controller
{
    //
    public function index(Request $request)
    {
        $cond_title = $request->input('cond_title');
        $query = Recipe::query();
        if (!empty($cond_title)) {
            $query -> where('title', 'LIKE', "%{$cond_title}%")
                -> orWhere('genre', 'LIKE', "%{$cond_title}%")
                -> orWhere('detail', 'LIKE', "%{$cond_title}%")
                -> orWhere('materials', 'LIKE', "%{$cond_title}%");
        }
        
            $posts = $query->get();
       
    //   $posts=Recipe::all();
        
        return view('recipe.index', ['posts' => $posts], ['cond_title' => $cond_title]);
    }
    
    public function show(Request $request)
    {
        $post=Recipe::find($request->id);
        
        return view('recipe.post',['post'=>$post]);
    }
    
    public function profile(Request $request)
    {
        $post=Recipe::find($request->id);
        $user=User::find($request->id);

        return view('recipe.profile',['post'=>$post],['user'=>$user]);
    }
}
