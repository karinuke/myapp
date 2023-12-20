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

        return view('mypage.menu.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Menu::$rules);

        $menu = new Menu;
        $form = $request->all();
        
        $maindishes=Recipe::where('genre', '主菜')->get();
        
        $sidedishes=Recipe::where('genre', '副菜')->get();
        
        $soups=Recipe::where('genre', '汁物')->get();
        
        return redirect('/', ['maindishes'=>$maindishes,'sidedishes'=>$sidedishes, 'soups'=>$soups]);
    }
}
