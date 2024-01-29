@php
$title = $maindish->title.'の献立';
@endphp
@extends('layouts.mypage')

@section('content')
<div class="container">
    <div class="menu_page">
        <p>{{ $menu->updated_at->format('Y年m月d日') }}</p>
        <h3>~{{ $maindish->title }}の献立~</h3>
        <div class="menu_img">
            <div class="large_img">
                <a href="{{ route('recipe.post', ['id' => $maindish->id]) }}">
                    <img src="{{ asset('storage/image/'.$maindish->image_path)}}" alt="{{ $maindish->title }}">
                    <p>主菜:{{ $maindish->title }}</p>
                </a>
            </div>
            <div class="small_img">
                <a href="{{ route('recipe.post', ['id' => $sidedish->id]) }}">
                    <img src="{{ asset('storage/image/'.$sidedish->image_path)}}" alt="{{ $sidedish->title }}">
                    <p>副菜:{{ $sidedish->title }}</p>
                </a>
                <a class="side_img" href="{{ route('recipe.post', ['id' => $soup->id]) }}">
                    <img src="{{ asset('storage/image/'.$soup->image_path)}}" alt="{{ $soup->title }}">
                    <p>汁物:{{ $soup->title }}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="accordion">
        <details class="accordion-001">
            <summary>主菜</summary>
            <div class="inside">
                <h5>材料：</h5>
                <p>{!! nl2br(e($maindish->materials)) !!} </p> 
                <h5>レシピ：</h5>
                <p>{!! nl2br(e($maindish->recipe)) !!}</p>
            </div>
        </details>
        <details class="accordion-001">
            <summary>副菜</summary>
            <div class="inside">
                <h5>材料：</h5>
                <p>{!! nl2br(e($sidedish->materials)) !!} </p> 
                <h5>レシピ：</h5>
                <p>{!! nl2br(e($sidedish->recipe)) !!}</p>
            </div>
        </details>
        <details class="accordion-001">
            <summary>汁物</summary>
            <div class="inside">
                <h5>材料：</h5>
                <p> {!! nl2br(e($soup->materials)) !!} </p>
                <h5>レシピ：</h5>
                <p>{!! nl2br(e($soup->recipe)) !!}</p>
            </div>
        </details>
    </div>
    
    <!--@foreach($maindish as $main)-->
    <!--    @foreach($sidedish as $side)-->
    <!--        @foreach($soup as $sp)-->
    <!--            @foreach($menus as $menu)-->
    <!--                <li>-->
    <!--                <div class="date">-->
    <!--                    {{ $menu->updated_at->format('Y年m月d日') }}-->
    <!--                </div>-->
    <!--                <div>-->
    <!--                    <p>{{$main->title}}</p>-->
    <!--                    <p>{{$side->title}}</p>-->
    <!--                    <div class="image col-md-6 text-right mt-4">-->
    <!--                        @if ($main->image_path)-->
    <!--                            <img src="{{ asset('storage/image/'.$post->image_path)}}" width="200" height="200">-->
    <!--                        @endif-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                </li>-->
    <!--            @endforeach-->
    <!--        @endforeach-->
    <!--    @endforeach-->
    <!--@endforeach-->
    
</div>
@endsection

