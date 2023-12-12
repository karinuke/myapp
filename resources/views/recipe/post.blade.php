@php
$title = $post->title;
@endphp
@extends('layouts.mypage')
{{--@section('title', {{$post->title}})--}}

@section('content')

<div class='post'>
  <div class="circle_post">
        <div class="circle_postimage">
            <img src="{{ secure_asset('storage/image/'.$post->image_path) }}">
        </div>
  </div>
  
  <div="recipe_posts"> 
        <p> 
            作成者：
            <a href="{{ route('recipe.profile', ['id'=>$post->id]) }}">{{ $post->user->username }} </a>
            <img src="{{ secure_asset( 'storage/images/'. $post->user->avatar ) }}" style="width:50px; height:50px; border-radius:50%; position:relative; left: 10px;"> 
        </p>
   <h4>     
        <p>{{$post->genre}}</p>
   </h4>
   <h2>
        <p>{{$post->title}}</p>
   </h2>
   <div align="center">
        <p>{{$post->detail}}</p>
   </div>
        
        <h5>材料</h5> 
        <div class="sample-box-03">
        <h4><p>{!! nl2br(e($post->materials)) !!}</p></h4>
        </div>
        
    <br>
  
        <div class="sample-box-05">
        <h4><p>{!! nl2br(e($post->recipe)) !!}</p></h4>
        </div>
  </div>
  
  <div align="center">
    <a class="btn btn-danger" href="{{ route('recipe.index') }}" >レシピ一覧に戻る</a>
  </div>
 </div>



@endsection

