@extends('layouts.mypage')
@section('title', '{{$title}}')
{{--https://dad-union.com/php/3481--}}

@section('content')

@foreach ($posts as $post)
<div class='post'>
  <div class="circle_post">
        <div class="circle_postimage">
            <img src="{{ secure_asset('storage/image/'.$post->image_path) }}">
        </div>
  </div>
  
  <div="recipe_posts"> 
        <p>{{$post->genre}}</p>
   
   <h2>
        <p>{{$post->title}}</p>
   </h2>
   <h3>
        <p>{{$post->detail}}</p>
   </h3>
        
        材料
        <div class="box_materials">
        <p>{{$post->materials}}</p>
        </div>
        
    <br>
  
        作り方
        <div class="box_recipe">
        <p>{{$post->recipe}}</p>
        </div>
  </div>
 </div>

@endforeach



@endsection

