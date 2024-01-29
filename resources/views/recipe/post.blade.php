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
  
    <div class="recipe_posts"> 
        <p> 
            作成者：
            <a href="{{ route('recipe.profile', ['id'=>$post->id]) }}" class="cp_textlink06">{{ $post->user->username }} </a>
            <img src="{{ secure_asset( 'storage/images/'. $post->user->avatar ) }}" style="width:50px; height:50px; border-radius:50%; position:relative; left: 10px;"> 
        </p>
        <h4> {{$post->genre}} </h4>
        <h2> {{$post->title}} </h2>
        
        <p>~{{$post->detail}}~</p>
        
        <br>
            
        <h5>材料</h5> 
        
        <div class="large-box">
            <div class="sample-box-03">
                <h4> {!! nl2br(e($post->materials)) !!} </h4>
            </div>
            
            <br>
      
            <div class="sample-box-05">
                <h4> {!! nl2br(e($post->recipe)) !!} </h4>
            </div>
        </div>
    </div>
</div>

<div align="center">
    <a class="btn btn-danger" href="{{ route('recipe.index') }}" >レシピ一覧に戻る</a>
</div>
 
@endsection

