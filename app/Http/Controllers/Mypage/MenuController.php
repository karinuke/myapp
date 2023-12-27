<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Menu;

class MenuController extends Controller
{
    //
    public function add()
    {
        $maindishes=Recipe::where('genre', '主菜')->get();
        
        $sidedishes=Recipe::where('genre', '副菜')->get();
        
        $soups=Recipe::where('genre', '汁物')->get();
        
        return view('mypage.menu.create', ['maindishes'=>$maindishes,'sidedishes'=>$sidedishes, 'soups'=>$soups]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Menu::$rules);

        $menu = new Menu;
        $form = $request->all();
        
        $menu->maindish = $request->maindish;
        $menu->sidedish = $request->sidedish;
        $menu->soup = $request->soup;
        
        unset($form['token']);
        
        $menu->fill($form);
        $menu->save();
        
        return redirect('/');
    }
}
