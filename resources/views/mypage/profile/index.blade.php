@extends('layouts.mypage')
@section('title', '登録情報')

@section('content')
    <div class="container">
        <div class="row">
            <h2>登録情報</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('mypage.profile.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">名前</th>
                                <th width="10%">ユーザー名</th>
                                <th width="20%">自己紹介</th>
                                <th width="10%">写真</th>
                                <th width="10%">資格th>
                                <th width="10%">SNS</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ Str::limit($profile->name, 100) }}</td>
                                    <td>{{ Str::limit($profile->username, 100) }}</td>
                                    <td>{{ Str::limit($profile->introduction, 250) }}</td>
                                    <td>{{ Str::limit($profile->image_path, 100) }}</td>
                                    <td>{{ Str::limit($profile->qualification, 100) }}</td>
                                    <td>{{ Str::limit($profile->SNS, 100) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection