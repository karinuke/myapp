@php
$title = 'プロフィール登録';
@endphp
@extends('layouts.mypage')

@section('content')
 <div class="title_box">
    <span class="title_text"><font size="6">プロフィール登録</font></span>
</div>
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('mypage.profile.create') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ユーザー名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">プロフィール写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">資格等</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="qualification"  rows="2" value="{{ old('qualification') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">SNS等</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="SNS" value="{{ old('SNS') }}">
                        </div>
                    </div>
                    @csrf
                    <div align="center">
                        <input type="submit" class="btn btn-danger" value="保存する">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
    