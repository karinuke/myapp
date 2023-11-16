<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    
    protected $guarded=array('id');
    
    public static $rules = array(
        'genre'=>'required',
        'title'=>'required',
        'detail'=>'required',
        'image_path'=>'required',
        'materials'=>'required',
        'recipe'=>'required',
          
    );
}
