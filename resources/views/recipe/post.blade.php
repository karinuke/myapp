@extends('layouts.mypage')
@section('title', '{{$title}}')
{{--https://dad-union.com/php/3481--}}

@section('content')

@foreach ($posts as $post)
 <div class="circle_post">
    <div class="circle_postimage">
            <img src="{{ secure_asset('storage/image/'.$post->image_path) }}">
    </div>
 </div>

@endforeach

@endsection

