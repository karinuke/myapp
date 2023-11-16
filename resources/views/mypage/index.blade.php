@extends('layouts.mypage')
@section('title', 'TOP PAGE')

@section('content')
    
    <div class"container">
        <img src="{{ secure_asset('image/topphoto.jpg') }}">
    
        <p>
            <button type="button" class="btn btn-danger" onclick="location.href='{{ route('mypage.recipe.create') }}' ">レシピを作る</button>
        </p>
    </div>
    
    {{--最近追加されたレシピを表示する--}}
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ secure_asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
    
    <div class="circle_parent">
    <span class="circle">
        <div class="circle_image">
            <img src="{{ secure_asset('image/主食.jpeg') }}">
            <p>主食
            <br>
            
            <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">見る</button>
            </p>
        </div>
    </span>
    <span class="circle">
        <div class="circle_image">
            <img src="{{ secure_asset('image/主菜.jpeg') }}">
            <p>主菜
            <br>
            <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">見る</button>
            </p>
        </div>
    </span>
    <span class="circle">
        <div class="circle_image">
            <img src="{{ secure_asset('image/副菜.jpeg') }}">
            <p>副菜
            <br>
            <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">見る</button>
            </p>
        </div>
    </span>
    <span class="circle">
        <div class="circle_image">
            <img src="{{ secure_asset('image/汁物.jpeg') }}">
            <p>汁物
            <br>
            <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.index')}}'">見る</button>
            </p>
        </div>
    </span>
    </div>

@endsection