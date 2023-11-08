<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //
    public function add()
    {
        return view('mypage.recipe.create');
    }
    
    public function edit()
    {
        return view('mypage.recipe.edit');
    }
    public function create(Request $request)
    {
        // admin/news/createにリダイレクトする
        return redirect('mypage/recipe/create');
    }
    //viewはviewテンプレートをそのまま表示。
    //redirectはroutingをもう一度通るから２回アクションがある。(投稿一覧など・・・)
    //editはviewじゃないと辻褄が合わなくなる。
    
}
