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
    
    public function edit(Request $request)
    {
        $profile=Profile::find($request->id);
        if(empty($profile)){
            abort(404);
        }
        
        return view('mypage.profile.edit',['profile_form' => $profile]);
        
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile=Profile::find($request->id);
        $profile_form=$request->all();
        
        if ($request->remove == 'true') {
            $profile_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        } else {
            $profile_form['image_path'] = $profile->image_path;
        }

        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);
        
        
        $profile->fill($profile_form)->save();
        
        return redirect('mypage/profile');
    }
}
