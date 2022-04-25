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
            <div style="display:flex;justify-content: space-between;">
                {{-- タイトル --}}
                <div class="form-group" style="width:70%;display:inline-block;">
                    <label for="titleform" class="form-label fs-4 m-0">タイトル(必須)<span
                            class="attention">20文字以下</span></label>
                    <input type="text" class="form-control" id="titleform" name="title" value="{{ old('title') }}"
                        placeholder="〜タイトルを入力してください〜">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- 天気 weather_id --}}
                <div class="form-group" style="width:25%;display:inline-block;">
                    <label for=" selectform" class='form-label fs-4 m-0'>天気<span class="attention">必須</span></label>
                    <select id='selectform' class='form-control' name='weather_id'>
                        @foreach (ConstList::WEATHER_LIST as $name => $number)
                            <option value="{{ $number }}" {{ old('weather_id') == $number ? 'selected' : '' }}>
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
                <label class='form-label fs-4 m-0' style="display:block;">気分<span class="attention">必須</span></label>
                <div style="display:flex;justify-content: space-between;">
                    @foreach (ConstList::MOOD_LIST as $name => $number)
                        <input type="radio" class="btn-check" name="mood_id" id="{{ $number }}"
                            value="{{ $number }}" {{ old('mood_id') == $number ? 'checked' : '' }}
                            autocomplete="off">
                        <label class="btn mood-btn" for="{{ $number }}">{{ $name }}</label>
                    @endforeach
                </div>
                @error('mood_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            {{-- 体調 health_id --}}
            <div class="form-group" {{-- style="width:100%;" --}}>
                <label class='form-label fs-4 m-0'>体調<span class="attention">必須</span></label>
                <div style="display:flex;justify-content: space-between;">
                    @foreach (ConstList::HEALTH_LIST as $name => $number)
                        <input type="radio" class="btn-check" name="health_id" id="{{ $number }}"
                            value="{{ $number }}" {{ old('health_id') == $number ? 'checked' : '' }}
                            autocomplete="off">
                        <label class="btn health-btn" for="{{ $number }}">{{ $name }}</label>
                    @endforeach
                </div>
                @error('heath_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            {{-- 本文 --}}
            <div class="form-group">
                <label for="content" class="form-label fs-4 m-0">本文(必須)<span class="attention">500文字以内</span></label>
                <textarea name='content' class="form-control" rows="10" id="content"
                    placeholder="〜本文を入力してください〜">{{ old('content') }}</textarea>
                <span class="show-count">残り500文字</span>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            {{-- 画像 --}}
            <div class="form-group">
                <label for="imageform" class="form-label fs-4 m-0">画像を追加(任意)<span
                        class="attention">10MB以下</span></label>
                <input type="file" id="imageform" class="form-control" name="diary_imgs[]" accept="image/png, image/jpeg"
                    multiple>
                @error('diary_imgs.*')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- 送信ボタン status --}}
            <button type='submit' name='status' value='2' class="col-12 mx-auto d-block btn btn-lg submit-btn"
                style="margin-bottom:20px;">下書きとして保存する</button>
            <button type='submit' name='status' value='1' class="col-12 mx-auto d-block btn btn-lg submit-btn"
                style="margin-bottom:20px;">投稿する</button>
        </form>
    </div>
@endsection
