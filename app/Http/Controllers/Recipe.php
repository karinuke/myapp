<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Recipe extends Controller
{
    //
    public function index(Request $request)
    {
    
       // $cond_title=$request->cond_title;
        // if($cond_title !=''){
        //     $posts=Recipe::where('title',cond_title)->get();
        // } else{
        //     $posts=Recipe::all();
        // }
        $posts=\DB::table('recipes')->get();
        
        return view('recipe.index', ['posts'=>$posts]);
    }
    
    public function post(Request $request)
    {
        $posts=\DB::table('recipes')->get();
        $title=\DB::table('recipes')->value('title');
        
        
        return view('recipe.post',['posts'=>$posts]);
    }
  
    public function maindish(Request $request)
    {
        $posts=\DB::table('recipes')->where('genre', '主菜')->get();
        
        return view('recipe.maindish', ['posts'=>$posts]);
    }    
    
    public function sidedish(Request $request)
    {
        $posts=\DB::table('recipes')->where('genre', '副菜')->get();
        
        return view('recipe.sidedish', ['posts'=>$posts]);
    }    
}
