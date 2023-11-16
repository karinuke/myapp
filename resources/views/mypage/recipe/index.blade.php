@extends('layouts.mypage')
@section('title', 'Myレシピ一覧')


@section('content')
<div class="container">
        <div class="row">
            <h2>MyPage</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('mypage.recipe.index') }}" method="get">
                    <div class="form-group row">
                        <div class="title_box">
                            <a class="title_text" href="{{route('mypage.profile.index')}}"><font size="6">登録情報</font></a>
                        </div>
                        <div class="title_box">
                            <a class="title_text" href="{{route('mypage.recipe.index')}}"><font size="6">Myレシピ一覧</font></a>
                        </div>
                        



@endsection