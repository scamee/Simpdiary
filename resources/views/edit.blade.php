@extends('layouts.app')

@section('content')
    {{-- 日記が登録されていれば表示。そうでなければ作成画面に遷移 --}}
    <div class="card-body py-2 px-4 form-container mx-auto">
        <h2 class="diary-info" style="display: block;">
            編集
        </h2>
        <h4 class="diary-info" style="display: block;">
            日付：{{ $diary->diary_date }}
            <br>
            <span>
                記入日：{{ $diary->created_at->format('Y-m-d') }}
                更新日：{{ $diary->updated_at->format('Y-m-d') }}
            </span>
        </h4>
        {{-- 編集 --}}
        <form method='POST' action="/update" enctype="multipart/form-data">
            @csrf
            <input type='hidden' name='diary_date' value="{{ $date }}">
            <div style="display:flex;justify-content: space-between;">
                {{-- タイトル title --}}
                <div class="form-group" style="width:70%; display:inline-block;">
                    <label for="titleform" class="form-label fs-4 m-0">タイトル<span
                            class="attention">必須・20文字以下</span></label>
                    <input type="text" class="form-control" id="titleform" name="title"
                        value="{{ old('title', $diary->title) }}" placeholder="〜タイトルを入力してください〜">
                    <span class="show-count-title">20文字まで</span>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- 天気 weather_id --}}
                <div class="form-group" style="width:25%;display:inline-block;">
                    <label for=" selectform" class='form-label fs-4 m-0'>天気<span class="attention">必須</span></label>
                    <select id='selectform' class='form-control' name='weather_id'>
                        @foreach (ConstList::WEATHER_LIST as $name => $number)
                            <option value="{{ $number }}"
                                {{ old('weather_id', $diary->weather_id) == $number ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('weather_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- 気分 mood_id --}}
            <div class="form-group">
                <label class='form-label fs-4 m-0'>気分<span class="attention">必須</span></label>
                <div style="display:flex;justify-content: space-between;">
                    @foreach (ConstList::MOOD_LIST as $name => $number)
                        <input type="radio" class="btn-check" name="mood_id" id="{{ $number }}"
                            value="{{ $number }}"
                            {{ old('mood_id', $diary->mood_id) == $number ? 'checked' : '' }} autocomplete="off">
                        <label class="btn mood-btn" for="{{ $number }}">{{ $name }}</label>
                    @endforeach
                </div>
                @error('mood_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- 体調 health_id --}}
            <div class="form-group">
                <label class='form-label fs-4 m-0'>体調<span class="attention">必須</span></label>
                <div style="display:flex;justify-content: space-between;">
                    @foreach (ConstList::HEALTH_LIST as $name => $number)
                        <input type="radio" class="btn-check" name="health_id" id="{{ $number }}"
                            value="{{ $number }}"
                            {{ old('health_id', $diary->health_id) == $number ? 'checked' : '' }} autocomplete="off">
                        <label class="btn health-btn" for="{{ $number }}">{{ $name }}</label>
                    @endforeach
                </div>
                @error('heath_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- 本文 content --}}
            <div class="form-group">
                <label for="content" class="form-label fs-4 m-0">日記本文<span class="attention">必須・500文字以内</span></label>
                <textarea name='content' class="form-control" rows="10" id="content"
                    placeholder="〜本文を入力してください〜">{{ old('content', $diary->content) }}</textarea>
                <span class="show-count">500文字まで</span>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- 画像 diary_imgs --}}
            <div class="form-group">
                <label for="imageform" class="form-label fs-4 m-0">画像を追加(任意)<span
                        class="attention">10MB以下</span></label>
                <input type="file" id="imageform" class="form-control" name="diary_imgs[]" accept="image/png, image/jpeg"
                    multiple>
            </div>
            @error('diary_imgs')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- 送信ボタン status --}}
            <button type='submit' name='status' value='2' class="col-12 mx-auto d-block btn btn-lg submit-btn"
                style="margin-bottom:20px;">下書きとして保存する</button>
            <button type='submit' name='status' value='1' class="col-12 mx-auto d-block btn btn-lg submit-btn"
                style="margin-bottom:20px;">投稿する</button>
        </form>
        {{-- 画像を削除modal --}}
        @if (!empty($images))
            <div class="images">
                <hr>
                <label for="imageform" class="form-label fs-4 m-0">画像を削除<span
                        class="attention">1度削除すると復元できません</span></label>
                <p style="margin-top:1rem;">クリック・タッチをすると画像が表示されます</p>
                @foreach ($images as $image)
                    <div class="rounded float-start img-thumbnail" data-bs-target="#image_Modal{{ $image->id }}"
                        data-bs-toggle="modal" style="width: 100%; margin-bottom:5px;cursor : zoom-in;">
                        <p class="image-name" style="cursor : zoom-in;">{{ $image->file_name }}</p>
                        <form method='POST' action=" /imageDelete" style="display:inline-block; float:right;">
                            @csrf
                            <input type="hidden" name='id' value="{{ $image->id }}">
                            <input type="hidden" name='file_path' value="{{ $image->file_path }}">
                            <input type="hidden" name='diary_date' value="{{ $date }}">
                            <button type="submit" class="btn submit-btn" style="width: 100%;">
                                <i class="me-1 fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    @include('modal.image_modal')
                @endforeach
            </div>
        @endif
    </div>
@endsection
