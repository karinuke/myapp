@extends('layouts.mypage')
@section('title', '登録情報の編集')

@section('content')
     <div class="container">
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
@endsection