<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    //
     public function add()
    {
        return view('mypage.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request -> all();
        
        if (isset($form['image'])){
            $path = $request -> file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $profile -> image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $profile -> fill($form);
        $profile->save();
        
        return redirect('mypage/profile/create');
    }
   
    public function edit()
    {
        return view('mypage.profile.edit');
    }
    
    public function update()
    {
        return redirect('mypage/profile/edit');
    }
    
    public function index(Request $request)
    {
        $cond_title=$request->cond_title;
        if($cond_title !=''){
            $posts=Profile::where('title',cond_title)->get();
        } else{
            $posts=Profile::all();
        }
        return view('mypage.profile.index', ['posts'=>$posts, 'cond_title'=>$cond_title]);
    }
}
