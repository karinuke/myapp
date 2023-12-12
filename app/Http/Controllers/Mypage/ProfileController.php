<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        
        return view('mypage.profile.index');
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
        $user = User::find($request->id);
        
        $user_form=$request->all();
        unset($user_form['_token']);
        
        $user->fill($user_form);
        $user->save();
        
        
        return redirect('mypage/profile');
    }
}
