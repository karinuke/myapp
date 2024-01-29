@php
$title = 'プロフィール登録情報';
@endphp
@extends('layouts.mypage')

@section('content')
    
<h2 align="center">
My Page
</h2>
<div class="col-md-8">
    <form action="{{ route('mypage.recipe.index') }}" method="get"></form>
</div>    

<div class="mypage_title_box">
    <div class="mypage_title_text">
        <a href="{{route('mypage.profile.index')}}" class="cp_textlink06"><font size="6">プロフィール登録情報</font></a>
    </div>
    <div class="mypage_title_text">
        <a href="{{route('mypage.recipe.index')}}" class="cp_textlink06"><font size="6">Myレシピ一覧</font></a>
    </div>
</div>

<div class="container">
    <hr color="#c0c0c0">
    <div class="row">
        <div class="list-news col-md-12 mx-auto">
            <div class="row" align='center'>
                <span class="avatar-form image-picker">
                    <label for="avatar" class="d-inline-block">
                       <img src="{{ asset('storage/images/'. Auth::user()->avatar)}}" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                    </label>
                </span>
                <br>
                <p> 名前 : {{ Auth::user()->name }} </p>
                <p> メールアドレス : {{ Auth::user()->email }}</p> 
                <p> ユーザー名 : {{ Auth::user()->username }} </p>
                <p> 自己紹介 : {{ Auth::user()->introduction }} </p>
                <p> 資格 : {{ Auth::user()->qualification }} </p>
                <p> SNS : {{ Auth::user()->SNS }} </p>
            </div>
        </div>
    </div>
    <div  align="center" >
        <button type="button" class="btn btn-danger" onclick="location.href='{{ route('mypage.profile.edit', ['id' => Auth::user()->id]) }}' ">プロフィールの編集</button>
    </div>
</div>
@endsection