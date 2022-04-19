@extends('layouts.app')

@section('content')
    <div class="card-body py-2 px-4 form-container mx-auto">
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
                <label for="titleform" class="form-label fs-4 m-0">タイトル(必須)<span class="attention">20文字以下</span></label>
                <input type="text" class="form-control" id="titleform" name="title" value="{{ old('title') }}"
                    placeholder="〜タイトルを入力してください〜">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="selectform" class='form-label fs-4 m-0'>体調(必須)</label>
                <select id='selectform' class='form-control' name='select'>
                    <option style="display: none;">
                        〜当日の体調を選択してください〜
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
                <label for="content" class="form-label fs-4 m-0">本文(必須)<span class="attention">500文字以内</span></label>
                <textarea name='content' class="form-control" rows="10" id="content"
                    placeholder="〜本文を入力してください〜">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="imageform" class="form-label fs-4 m-0">画像を追加(任意)<span
                        class="attention">10MB以下</span></label>
                <input type="file" id="imageform" class="form-control" name="diary_imgs[]" accept="image/png, image/jpeg"
                    multiple>
                @error('diary_imgs.*')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type='submit' class="col-12 mx-auto d-block btn submit-btn btn-lg" value="保存">
        </form>
    </div>
@endsection
