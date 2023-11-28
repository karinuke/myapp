@php
$title = 'レシピ一覧';
@endphp
@extends('layouts.mypage')

@section('content')
<div class="title_box">
    <span class="title_text"><font size="6">レシピ一覧</font></span>
</div>
<div class="col-md-8">
    <form action="{{ route('recipe.index') }}" method="get">
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
                            <p><a href="{{ route('recipe.post', ['id' => $post->id]) }}">{{ $post->title }}</a></p>
                        </h2>
                        
                        <p>{{$post->detail}}</p>
                        
                        <div class="image col-md-6 text-right mt-4">
                            @if ($post->image_path)
                                <img src="{{ asset('storage/image/'.$post->image_path)}}">
                            @endif
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            
            </div>
        </div>
    </div>
    </div>
    
            
       {{-- <div class="row">
            <div class="list-recipe col-md-12 mx-auto">
                <div class="row_recipe_table">
                    <table class="table table-sucess table-stripped">
                        <thead>
                            <tr class="table-success">
                                <th width="8%">種類</th>
                                <th width="20%">タイトル</th>
                                <th width="20%">詳細やポイント</th>
                                <th width="30%">完成写真</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $recipe)
                                <tr>
                                    <th>{{ $recipe->genre }}</th>
                                    <td>{{ Str::limit($recipe->title, 100) }}</td>
                                    <td>{{ Str::limit($recipe->detail, 250) }}</td>
                                    {{--<td>{{ Str::limit($recipe->image_path, 250) }}</td>
                                    <td>
                                        <div class="image col-md-6 text-right mt-4">
                                        @if($recipe->image_path)
                                        <img src="{{asset('storage/image' .$recipe->image_path)}}">
                                        @endif
                                        </div>
                                    </td>
                                    
                                    <td><div><a href="{{ route('recipe.post', ['id' => $recipe->id]) }}">見る</a></div></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>--}}
    </div>
@endsection