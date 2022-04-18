@extends('layouts.app')

@section('content')
    <div class="card-body col-10 mx-auto">
        <h2 class="diary-info" style="display: block;">
            作成画面
        </h2>
        <h4 class="diary-info" style="display: block;">
            日付：{{ $date }}
        </h4>
        <form method='POST' action="/store" enctype="multipart/form-data">
            @csrf
            <input type='hidden' name='diary_date' value="{{ $date }}">
            <input type='hidden' name='user_id' value="{{ $user['id'] }}">
            <div class="form-group">
                <label for="titleform" class="form-label fs-4 m-0">タイトル</label>
                <input type="text" class="form-control" id="titleform" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="selectform" class='form-label fs-4 m-0'>体調</label>
                <select id='selectform' class='form-control' name='select'>
                    <option style="display: none;">
                        --選択してください--
                    </option>
                    <option value="1" @if (1 === (int) old('select')) selected @endif>
                        良い
                    </option>
                    <option value="2" @if (2 === (int) old('select')) selected @endif>
                        普通
                    </option>
                    <option value="3" @if (3 === (int) old('select')) selected @endif>
                        悪い
                    </option>
                </select>
                @error('select')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content" class="form-label fs-4 m-0">本文</label>
                <textarea name='content' class="form-control" rows="10" id="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="imageform" class="form-label fs-4 m-0">画像を追加</label>
                <input type="file" id="imageform" class="form-control" name="diary_img" accept="image/png, image/jpeg">
            </div>
            <input type='submit' class="col-12 mx-auto d-block btn submit-btn btn-lg" value="保存">
        </form>
    </div>
@endsection
