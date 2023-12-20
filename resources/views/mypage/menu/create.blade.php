@php
$title = 'CREATE MENU';
@endphp
@extends('layouts.mypage')

@section('content')
<div class="title_box">
    <span class="title_text"><font size="6">献立作成</font></span>
 </div>
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <form action="{{ route('mypage.menu.create') }}" method="post" enctype="multipart/form-data">
                    
                    @foreach ($maindishes as $maindish)
                    <div>
                        <h3>
                            <p>{{$maindish->genre}}</p>
                        </h3>
                        <h2>
                            <p><a href="{{ route('recipe.post', ['id' => $maindish->id]) }}">{{ $maindish->title }}</a></p>
                        </h2>
                        
                        <p>{{$maindish->detail}}</p>
                        
                        <div class="image col-md-6 text-right mt-4">
                            @if ($maindish->image_path)
                                <img src="{{ asset('storage/image/'.$maindish->image_path)}}">
                            @endif
                        </div>
                         <img src="{{ secure_asset( 'storage/images/'. $maindish->user->avatar ) }}" style="width:50px; height:50px; border-radius:50%; position:relative; right: 10px;"> {{ $maindish->user->username }}｜{{ $post->created_at }}
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
                    
                  
                    
@endsection