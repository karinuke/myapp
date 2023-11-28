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
                                <img src="{{ asset('storage/image/'.$post->image_path)}}">
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
    </div>
    
    <div class="circle_parent container">
        <span class="circle">
            <div class="circle_image">
                <img src="{{ secure_asset('image/主食.jpeg') }}">
                <p class="sub_button">主食
                <br>
                
                <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.staple')}}'">見る</button>
                </p>
            </div>
        </span>
        <span class="circle">
            <div class="circle_image">
                <img src="{{ secure_asset('image/主菜.jpeg') }}">
                <p class="sub_button">主菜
                <br>
                <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.maindish')}}'">見る</button>
                </p>
            </div>
        </span>
        <span class="circle">
            <div class="circle_image">
                <img src="{{ secure_asset('image/副菜.jpeg') }}">
                <p class="sub_button">副菜
                <br>
                <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.sidedish')}}'">見る</button>
                </p>
            </div>
        </span>
        <span class="circle">
            <div class="circle_image">
                <img src="{{ secure_asset('image/汁物.jpeg') }}">
                <p  class="sub_button">汁物
                <br>
                <button type="button" class="btn btn-danger" onclick="location.href='{{ route('recipe.soup')}}'">見る</button>
                </p>
            </div>
        </span>
    </div>

@endsection