@extends('layouts.mypage')
@section('title', 'レシピ投稿')

@section('content')
 <div class="title_box">
    <span class="title_text"><font size="6">レシピ投稿</font></span>
 </div>
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <form action="{{ route('mypage.recipe.create') }}" method="post" enctype="multipart/form-data">

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
                            {{--<input type="text" name="genre">をなくす--}}
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
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">詳細やポイント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="detail" rows="3">{{ old('detail') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">完成写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">材料</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="materials" rows="10">{{ old('materials') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">作り方</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="recipe" rows="30">{{ old('recipe') }}</textarea>
                        </div>
                    </div>
                    @csrf
                    <div align="center">
                        <input type="submit" class="btn btn-danger" value="投稿！">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection