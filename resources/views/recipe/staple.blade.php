@php
$title = 'レシピ一覧';
@endphp
@extends('layouts.mypage')


@section('content')
<div class="title_box">
    <span class="title_text"><font size="6">レシピ一覧・主食</font></span>
</div>
<div class="col-md-8">
    <form action="{{ route('recipe.staple') }}" method="get">
    </form>
</div>
<div class="container">
    <hr color="#c0c0c0">
        <div class="row">
            <div class="posts">
                <div class="recipe_post">
                    @foreach ($posts as $post)
                        <div class="recipe_post_child">
                            <h3>
                                <p>{{$post->genre}}</p>
                            </h3>
                            <h2>
                                <p><a href="{{ route('recipe.post', ['id' => $post->id]) }}">{{ $post->title }}</a></p>
                            </h2>
                            
                            <p>{{$post->detail}}</p>
                            
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/'.$post->image_path)}}">
                                @endif
                            </div>
                           <img src="{{ secure_asset( 'storage/images/'. $post->user->avatar ) }}" style="width:50px; height:50px; border-radius:50%; position:relative; right: 10px;"> {{ $post->user->username }}｜{{ $post->created_at }}
                        </div>
                        <hr color="#c0c0c0">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection