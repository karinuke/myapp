@php
$title = 'CREATE MENU';
@endphp
@extends('layouts.mypage')

@section('content')
<div class="title_box">
    <span class="title_text"><font size="6">献立作成</font></span>
</div>
<div class="container">
    <form action="{{ route('mypage.menu.create') }}" method="post" enctype="multipart/form-data">
        <h2>主菜</h2>
        <div class="d-flex">
            @foreach ($maindishes as $maindish)
                <label class="menu_cont">
                　  <input type="radio" name="maindish" value="{{ $maindish->id }}">
                　  <div>
                        <h2>{{ $maindish->title }}</h2>
                        <div class="image col-md-6 text-right mt-4">
                            @if ($maindish->image_path)
                                <img src="{{ asset('storage/image/'.$maindish->image_path)}}">
                            @endif
                        </div>
                    </div>
                </label>
            @endforeach
        </div>
        
        <h2>副菜</h2>
        <div class="d-flex">
            @foreach ($sidedishes as $sidedish)
                <label class="menu_cont">
                　  <input type="radio" name="sidedish" value="{{ $sidedish->id }}">
                　  <div>
                        <h2>{{ $sidedish->title }}</h2>
                        <div class="image col-md-6 text-right mt-4">
                            @if ($sidedish->image_path)
                                <img src="{{ asset('storage/image/'.$sidedish->image_path)}}">
                            @endif
                        </div>
                    </div>
                </label>
            @endforeach
        </div>
        
        <h2>汁物</h2>
        <div class="d-flex">
            @foreach ($soups as $soup)
                <label class="menu_cont">
                　  <input type="radio" name="soup" value="{{ $soup->id }}">
                　  <div>
                        <h2>{{ $soup->title }}</h2>
                        <div class="image col-md-6 text-right mt-4">
                            @if ($soup->image_path)
                                <img src="{{ asset('storage/image/'.$soup->image_path)}}">
                            @endif
                        </div>
                    </div>
                </label>
            @endforeach
        </div>
        @csrf
        
        <div class="text-center">
            <input type="submit" class="btn btn-danger" value="作成！">
        </div>
    </form>
</div>              
@endsection