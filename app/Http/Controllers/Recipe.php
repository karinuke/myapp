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
}
