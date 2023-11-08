@extends('layouts.mypage')

@section('title', 'プロフィール登録')

@section('content')

 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの登録</h2>
                <form action="{{ route('mypage.profile.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">ユーザー名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="introduction" rows="3"{{ old('introduction') }}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">プロフィール写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">資格</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="qualifications" rows="10">{{ old('qualifications') }}</textarea>
                        </div>
                    </div>
                    
                    @csrf
                    <input type="submit" class="btn btn-primary" value="保存する">
                </form>
            </div>
        </div>
    </div>