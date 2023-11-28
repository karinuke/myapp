@php
$title = 'レシピ一覧';
@endphp
@extends('layouts.mypage')


@section('content')
<div class="title_box">
    <span class="title_text"><font size="6">レシピ一覧・副菜</font></span>
</div>
<div class="col-md-8">
                <form action="{{ route('recipe.sidedish') }}" method="get">
                </form>
            </div>
        </div>
        <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts">

                @foreach ($posts as $post)
                    <div>
                        <h3>
                            <p>{{$post->genre}}</p>
                        </h3>
                        <h2>
                            <p>{{$post->title}}</p>
                        </h2>
                        
                        <p>{{$post->detail}}</p>
                        
                    <div class="image col-md-6 text-right mt-4">
                        @if ($post->image_path)
                            <img src="{{ asset('storage/image/'.$post->image_path)}}">
                        @endif
                    </div>
                    <div><a href="{{ route('recipe.post', ['id' => $post->id]) }}">見る</a></div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection