@php
$title = 'Myレシピ一覧';
@endphp
@extends('layouts.mypage')

@section('content')

<h2 align="center">
My Page
</h2>
<div class="col-md-8">
    <form action="{{ route('mypage.recipe.index') }}" method="get">
    </form>
</div>    

<div class="mypage_title_box">
    <a class="mypage_title_text" href="{{route('mypage.profile.index')}}"><font size="6">プロフィール登録情報</font></a>
    
    <a class="mypage_title_text" href="{{route('mypage.recipe.index')}}"><font size="6">Myレシピ一覧</font></a>
</div>

<div class="container">

        <div class="row">
            <div class="posts">
                <br>
               @foreach ($posts as $post)
                    <article class="article-item">
                        <div class="article-title"><a href="{{ route('recipe.post', ['id' => $post->id]) }}">{{ $post->title }}</a></div>
                        <div class="article-info">
                            {{ $post->created_at }}｜{{ $post->user->name }}
                        </div>
                    </article>
                    @can('update', $post)
                    <div>
                        <a class="btn btn-danger" href="{{ url('mypage/recipe/edit/?id='. $post->id) }}">編集</a>
                    </div>
                    @endcan
                    @can('delete', $post)
                    <div>
                        <a href="{{ route('mypage.recipe.delete', ['id' => $post->id]) }}">削除</a>
                    </div>
                    @endcan
                    
                    <hr color="#c0c0c0">
                    <br>
                @endforeach

            </div>       
        </div>
</div>

@endsection