<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Recipe;;

class RecipeController extends Controller
{
    //
    public function add()
    {
        return view('mypage.recipe.create');
    }
   
    public function create(Request $request)
    {
        $this->validate($request, Recipe::$rules);
        
        $recipe=new Recipe;
        $recipe->user_id = \Auth::id();
        $form=$request->all();
        
        if(isset($form['image'])){
            $path=$request->file('image')->store('public/image');
            $recipe->image_path=basename($path);
        }else{
            $recipe->image_path =null;
        }
        
        unset($form['token']);
        unset($form['image']);
        
        $recipe->fill($form);
        $recipe->save();
        
        return redirect('recipe/');
    }
    //viewはviewテンプレートをそのまま表示。
    //redirectはroutingをもう一度通るから２回アクションがある。(投稿一覧など・・・)
    //editはviewじゃないと辻褄が合わなくなる。
    
    public function index(Request $request)
    {
        $posts=Recipe::all();
        $posts=\Auth::user()->recipes()->orderBy('created_at', 'desc')->get();
        $data=[
            'posts'=>$posts,
            ];
        
        return view('mypage.recipe.index', ['posts'=>$posts, 'data'=>$data]);
    }
    
     
    public function edit(Request $request)
    {
        
        $posts = Recipe::find($request->id);
        if (empty($posts)) {
            abort(404);
        }
        
        return view('mypage.recipe.edit', ['posts'=>$posts]);
    }
    
    
    public function update(Request $request)
    {
        //$this->validate($request, Recipe::$rules);
        //dd($request);
        $posts=Recipe::find($request->id);
        
        //$this->authorize('update', $posts);
        
        $posts_form=$request->all();
        unset($posts_form['_token']);
        
        $posts->fill($posts_form);
        $posts->save();
        
        return redirect('mypage/recipe');
    }
    
    public function delete(Request $request)
    {
        
        //$this->authorize('delete', $posts);
        $posts = Recipe::find($request->id);
        
        $posts->delete();
        
        return redirect('mypage/recipe');
    }
    
}