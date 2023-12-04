@php
$title = '登録情報の編集';
@endphp
@extends('layouts.mypage')

@section('content')
<div id="profile-edit-form" class="container">
        <div class="row">
            <div class="col-8 offset-2">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 bg-white">

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">プロフィール編集</div>

                <form method="POST" action="{{ route('mypage.profile.edit') }}" class="p-5" enctype="multipart/form-data">
                    @csrf

                    {{-- アバター画像 --}}
                    <span class="avatar-form image-picker">
                        <input type="file" name="avatar" class="d-none" accept="image/png,image/jpeg,image/gif" id="avatar">
                        <label for="avatar" class="d-inline-block">
                            <img src="{{ asset('storage/images/'. Auth::user()->avatar)}}" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                        </label>
                    </span>
                    
                    {{-- ニックネーム --}}
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="email">メールアドレス</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="username">ユーザー名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                        </div>
                    </div><div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="introduction" value="{{ $user->introduction }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="qualification">資格</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="qualification" value="{{ $user->qualification }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="SNS">SNS</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="SNS" value="{{ $user->SNS }}">
                        </div>
                    </div>
                    
                    

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="保存">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection



 {{--    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの編集</h2>
                <form action="{{ route('mypage.profile.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ユーザー名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="username" value="{{ $profile_form->username }}"></textarea>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">プロフィール写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $profile_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="qualification">資格等</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="qualification" rows="2">{{ $profile_form->qualification }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="SNS">SNS等</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="SNS">{{ $profile_form->SNS }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="更新する">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection--}}