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
    
    public function edit(Request $request)
    {
        
        $recipe = Recipe::find($request->id);
        //$this->authorize($recipe);
        if (empty($recipe)) {
            abort(404);
        }
        
        return view('mypage.recipe.edit', ['recipe_form'=>$recipe]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Recipe::$rules);
        
        $recipe=new Recipe;
        $recipe->user_id = \Auth::id();
        $form=$request->all();
        //https://newmonz.jp/lesson/laravel-basic/chapter-8
        
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
    
    public function update(Request $request)
    {
        
        $this->validate($request, Recipe::$rules);
        $posts=Recipe::find($request->id);
        $this->authorize($posts);
        $recipe_form=$request->all();
        
        if ($request->remove == 'true') {
            $recipe_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $recipe_form['image_path'] = basename($path);
        } else {
            $recipe_form['image_path'] = $recipe->image_path;
        }

        unset($recipe_form['image']);
        unset($recipe_form['remove']);
        unset($recipe_form['_token']);
        
        
        $recipe->fill($recipe_form)->save();
        
        return redirect('mypage/recipe', ['posts'=>$posts]);
    }
    
    public function delete(Request $request)
    {
        
        $posts = Recipe::find($request->id);
        $this->authorize($posts);
        $posts->delete();
        
        return redirect(route('mypage.recipe.index'),['posts'=>$posts]);
    }
    
}