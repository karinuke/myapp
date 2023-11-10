<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
      'name' => 'required',
      'username'=> 'required',
      'introduction'=> 'required',
      'image_path'=> 'required',
      'qualification'=> 'required',
      'SNS'=> 'required'
    );
}
