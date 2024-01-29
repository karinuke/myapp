@php
$title = 'TOP PAGE';
@endphp
@extends('layouts.mypage')

@section('content')
    <img src="{{ secure_asset('image/topphoto.jpg') }}">
    <div class="container">
        <p class="top_button">
            <a class="btn btn-danger" href="{{ route('mypage.recipe.create') }}">レシピを作る</a>
        </p>
    </div>
    
    {{--最近追加されたレシピを表示する--}}
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts">
                
                @foreach ($posts as $post)
                    <li>
                    <div class="date">
                        {{ $post->updated_at->format('Y年m月d日') }}
                    </div>
                    <div>
                        <p>{{$post->title}}</p>
                        <p>{{$post->detail}}</p>
                        <div class="image col-md-6 text-right mt-4">
                            @if ($post->image_path)
                                <img src="{{ asset('storage/image/'.$post->image_path)}}" width="200" height="200">
                            @endif
                        </div>
                    </div>
                    
                    <hr color="#c0c0c0">
                    </li>
                @endforeach
               <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">全て見る</button>
                    
            </div>
        </div>
    </div>
    
    {{--献立作る機能の実装--}}  
    <div class="menu" align="center">
        <h2>今日の献立</h2>
       
        <p>{{ $menus->updated_at->format('Y年m月d日') }}</p>
        <h3>~{{ $maindish->title }}の献立~</h3>
        <a class="menu_img" href="{{ route('mypage.menu', ['id' => $menus->id]) }}">
            <div class="large_img">
                <img src="{{ asset('storage/image/'.$maindish->image_path)}}" alt="{{ $maindish->title }}">
            </div>
            <div class="small_img">
                <img src="{{ asset('storage/image/'.$sidedish->image_path)}}" alt="{{ $sidedish->title }}">
                <div class="side_img">
                    <img src="{{ asset('storage/image/'.$soup->image_path)}}" alt="{{ $soup->title }}">
                </div>
            </div>
        </a>
        <button type="button" class="btn btn-danger" onclick="location.href='{{ route('mypage.menu.create')}}'">献立を作る</button>
    </div>
@endsection