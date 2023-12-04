<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfileController extends Controller
{
    //
    //  public function add()
    // {
    //     return view('mypage.profile.create');
    // }
    
    // public function create(Request $request)
    // {
    //     $this->validate($request, Profile::$rules);
        
    //     $profile = new Profile;
    //     $form = $request -> all();
        
    //     if (isset($form['image'])){
    //         $path = $request -> file('image')->store('public/image');
    //         $profile->image_path = basename($path);
    //     } else {
    //         $profile -> image_path = null;
    //     }
        
    //     unset($form['_token']);
    //     unset($form['image']);
        
    //     $profile -> fill($form);
    //     $profile->save();
        
    //     return redirect('mypage/profile/create');
    // }
   
    
    
    public function index(Request $request)
    {
        $user = new User;
        $form=$request->all();
        
        
        
        return view('mypage.profile.index', ['user'=>$user]);
    }
    
    public function edit(Request $request)
    {
        
        $user = User::find($request->id);
        if (empty($user)) {
            abort(404);
        }
            
        return view(('mypage.profile.edit'), ['user'=>$user]);
    }
    
    
    public function update(Request $request)
    {
        
        // $this -> validate ($request, User::$rules);
        $user = Auth::id($request->id);
        
        $user_form=$request->all();
        unset($user_form['_token']);
        
        $user->fill($user_form);
        $user->save();
        
        
        return redirect(('mypage/profile'),['user'=>$user]);
    }
}
