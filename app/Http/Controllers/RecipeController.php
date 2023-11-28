<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

class RecipeController extends Controller
{
    //
    public function index(Request $request)
    {
    
        $posts = Recipe::all();
        
        
        return view('recipe.index', ['posts'=>$posts]);
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
}
