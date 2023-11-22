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
    
    public function edit()
    {
        $profile=Recipe::find($request->id);
        if(empty($recipe)){
            abort(404);
        }
        
        return view('mypage.recipe.edit');
    }
    public function create(Request $request)
    {
        $this->validate($request, Recipe::$rules);
        
        $recipe=new Recipe;
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
        $cond_title=$request->cond_title;
        if($cond_title !=''){
            $posts=Recipe::where('title',cond_title)->get();
        } else{
            $posts=Recipe::all();
        }
        return view('mypage.recipe.index', ['posts'=>$posts, 'cond_title'=>$cond_title]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Recipe::$rules);
        $recipe=Recipe::find($request->id);
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
        
        return redirect('mypage/recipe');
    }
}
