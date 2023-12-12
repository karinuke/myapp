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
    
    public function staple(Request $request)
    {
        $posts=Recipe::where('genre', '主食')->get();
        
        return view('recipe.staple', ['posts'=>$posts]);
    }    
  
    public function maindish(Request $request)
    {
        $posts=Recipe::where('genre', '主菜')->get();
        
        return view('recipe.maindish', ['posts'=>$posts]);
    }    
    
    public function sidedish(Request $request)
    {
        $posts=Recipe::where('genre', '副菜')->get();
        
        return view('recipe.sidedish', ['posts'=>$posts]);
    }    
    
    public function soup(Request $request)
    {
        $posts=Recipe::where('genre', '汁物')->get();
        
        return view('recipe.soup', ['posts'=>$posts]);
    }
    
    public function profile(Request $request)
    {
        $post=Recipe::find($request->id);
        $user=User::find($request->id);

        return view('recipe.profile',['post'=>$post],['user'=>$user]);
    }
}
