@php
$title = $post->user->username .'さんのプロフィール';
@endphp
@extends('layouts.mypage')

@section('content')

   
    <div align='center'>
        
        <div class='profile'>
            <img src="{{ secure_asset('image/緑.jpeg') }}">
            <div>
            <h2>PROFILE</h2>  
            <h3>プロフィール</h3>
            <br>
            <img src="{{ secure_asset( 'storage/images/'. $post->user->avatar ) }}" style="width:270px; height:270px; border-radius:50%;"> 
            </div>
        </div>
        
        <div class='details'>
            <h3>
                {{ $post->user->username }}
            </h3>
    
                <br>

            <div class="balloon">
                <h5>            
                    {{ $post->user->introduction }}
                </h5>
            </div>
                <br>
                
            資格：
                <br>
                {{ $post->user->qualification }}
                <br>
                <br>
                SNS:
                <br>
                {{ $post->user->SNS }}
            
        </div>
    </div>

@endsection