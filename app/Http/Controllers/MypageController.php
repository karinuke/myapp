<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Models\Mypage\:

class MypageController extends Controller
{
    //
    public function index(Request $request)
    {
        //$posts=Mypage::all()->sortByDesc('updated_at');
        
        //if(count($posts)>0){
        //    $headline=$posts->shitf();
        //} else {
        //    $headline=null;
        //}
        
        return view('mypage.index');//['headline'=>$headline, 'posts' => $posts]);
    }
}
