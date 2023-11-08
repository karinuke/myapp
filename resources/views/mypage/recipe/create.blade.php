@extends('layouts.mypage')
@section('title', 'レシピ投稿')

@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピの投稿</h2>
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
                            <input type="text" name="genre">
                            <select name="genre">
                                <option value="主食">主食</option>
                                <option value="主菜">主菜</option>
                                <option value="副菜">副菜</option>
                                <option value="汁物">汁物</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">レシピのキャッチコピー</label>
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
                        <label class="col-md-2">出来上がりの写真</label>
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
                        <label class="col-md-2">分量</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="quantity" rows="10">{{ old('quantity') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">作り方</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="recipe" rows="30">{{ old('recipe') }}</textarea>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="投稿！">
                </form>
            </div>
        </div>
    </div>
@endsection