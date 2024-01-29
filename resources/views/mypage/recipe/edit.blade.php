@php
$title = 'レシピ編集';
@endphp

@extends('layouts.mypage')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピ編集</h2>
                <form action="{{ route('mypage.recipe.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">料理の種類</label>
                        <div class="col-md-10">
                         
                            <select name="genre">
                                <option value="主食">主食</option>
                                <option value="主菜">主菜</option>
                                <option value="副菜">副菜</option>
                                <option value="汁物">汁物</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">キャッチコピー</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $posts->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">詳細やポイント</label>
                        <div class="col-md-10">
                            <input class="form-control" name="detail" value="{{ $posts->detail }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">完成写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image" value="{{ $posts->image_path }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">材料</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="materials" rows="10">{{ $posts->materials }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">作り方</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="recipe" rows="20" >{{ $posts->recipe }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $posts->id }}">
                            @csrf
                            <div align="center">
                            <input type="submit" class="btn btn-danger" value="更新する">
                            </div>
                        </div>
                    </div>
                </form>
                </div>
        </div>
    </div>
@endsection