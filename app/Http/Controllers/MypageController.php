<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

class MypageController extends Controller
{
    //
    public function index(Request $request)
    {
        $posts=Recipe::all()->sortByDesc('updated_at');
        
        if(count($posts)>0){
            $headline=$posts->shift();
        } else {
            $headline=null;
        }
        
        return view(('mypage.index'), ['headline'=>$headline, 'posts' => $posts]);
    }
}
