@extends('layouts.mypage')
@section('title', 'TOP PAGE')

@section('content')
    <img src="{{ secure_asset('image/topphoto.jpg') }}">
    <div  align="center" >
        <button type="button" class="btn btn-danger" onclick="location.href='{{ route('mypage.recipe.create') }}' ">レシピを作る</button>
    </div>
    
    {{--最近追加されたレシピを表示する--}}
    
    <div class="circle_parent">
    <span class="circle">
        主食
        <br>
        <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">見る</button>
    </span>
    <span class="circle">
        主菜
        <br>
        <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">見る</button>
    </span>
    <span class="circle">
        副菜
        <br>
        <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">見る</button>
    </span>
    <span class="circle">
        汁物
        <br>
        <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">見る</button>
    </span>
    </div>

@endsection