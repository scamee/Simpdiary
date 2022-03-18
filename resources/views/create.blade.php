@extends('layouts.app')

@section('content')
    <div class="card-header">
        <span class="month" style="width:150px;">
            {{ $date }}
        </span>
    </div>
    <div class="card-body">
        <form method='POST' action="/store" enctype="multipart/form-data">
            @csrf
            <input type='hidden' name='diary_date' value="{{ $date }}">
            <input type='hidden' name='user_id' value="{{ $user['id'] }}">
            <div class="form-group col-10 mx-auto">
                <label for="titleform" class="form-label fs-4 text-primary m-0">タイトル</label>
                <input type="text" class="form-control m-2" id="titleform" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-10 mx-auto">
                <label for="selectform" class='form-label fs-4 text-primary m-0'>体調</label>
                <select id='selectform' class='form-control m-2' name='select'>
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
            <div class="form-group col-10 mx-auto">
                <label for="content" class="form-label fs-4 text-primary m-0">本文</label>
                <textarea name='content' class="form-control m-2" rows="10" id="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-10 mx-auto">
                <input type="file" name="diary_img" accept="image/png, image/jpeg">
            </div>
            <input type='submit' class=" col-10 mx-auto d-block btn btn-outline-primary btn-lg" value="保存">
        </form>
    </div>
@endsection
