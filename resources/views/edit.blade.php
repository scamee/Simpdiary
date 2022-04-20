@extends('layouts.app')

@section('content')
    {{-- 日記が登録されていれば表示。そうでなければ「日記書こう」 --}}
    @if (!empty($diary))
        <div class="card-body py-2 px-4 form-container mx-auto">
            <h2 class="diary-info" style="display: block;">
                編集画面
            </h2>
            <h4 class="diary-info" style="display: block;">
                日付：{{ $diary->diary_date }}
                <br>
                <span>
                    記入日：{{ $diary->created_at->format('Y-m-d') }}
                    更新日：{{ $diary->updated_at->format('Y-m-d') }}
                </span>
            </h4>
            <form method='POST' action="/update" enctype="multipart/form-data">
                @csrf
                <input type='hidden' name='diary_date' value="{{ $date }}">
                <div class="form-group">
                    <label for="titleform" class="form-label fs-4 m-0">タイトル(必須)<span
                            class="attention">20文字以下</span></label>
                    <input type="text" class="form-control" id="titleform" name="title"
                        value="{{ old('title', $diary->title) }}" placeholder="〜タイトルを入力してください〜">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="selectform" class='form-label fs-4 m-0'>体調(必須)</label>
                    <select id='selectform' class='form-control' name='select'>
                        <option value="1" {{ old('select', $diary->health_id) == 1 ? 'selected' : '' }}>
                            良い
                        </option>
                        <option value="2" {{ old('select', $diary->health_id) == 2 ? 'selected' : '' }}>
                            普通
                        </option>
                        <option value="3" {{ old('select', $diary->health_id) == 3 ? 'selected' : '' }}>
                            悪い
                        </option>
                    </select>
                    @error('select')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content" class="form-label fs-4 m-0">本文(必須)<span
                            class="attention">500文字以内</span></label>
                    <textarea name='content' class="form-control" rows="10" id="content"
                        placeholder="〜本文を入力してください〜">{{ old('content', $diary->content) }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imageform" class="form-label fs-4 m-0">画像を追加(任意)<span
                            class="attention">10MB以下</span></label>
                    <input type="file" id="imageform" class="form-control" name="diary_imgs[]"
                        accept="image/png, image/jpeg" multiple>
                </div>
                <input type='submit' class="col-12 mx-auto d-block btn btn-lg submit-btn" style="margin-bottom:20px;"
                    value="保存">
            </form>
            @if (!empty($images))
                <div class="images">
                    @php
                        $i = 0;
                    @endphp
                    <hr>
                    <label for="imageform" class="form-label fs-4 m-0">画像を削除<span
                            class="attention">1度削除すると復元できません</span></label>
                    <p style="margin-top:1rem;">クリック・タッチをすると画像が表示されます</p>
                    @foreach ($images as $image)
                        <div class="rounded float-start img-thumbnail" style="width: 100%; margin-bottom:5px;">
                            <a data-bs-target="#image_Modal<?php echo $i; ?>" data-bs-toggle="modal">
                                <p class="d-inline-block">{{ $image->file_name }}</p>
                            </a>
                            <form method='POST' action="/imageDelete" style="display:inline-block; float:right;">
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
                        @php
                            ++$i;
                        @endphp
                    @endforeach
                </div>
            @endif
        </div>
    @else
        <div class="card-body py-2 px-4 mx-auto text-center align-middle">
            <h3 class="diary-info">日記が未記入です</h3>
            <div class="d-block">
                <a href="{{ route('create', ['date' => $date]) }}" class="btn submit-btn btn-lg"><i
                        class="me-1 fa-solid fa-pen"></i>日記を書く</a>
            </div>
        </div>
    @endif
    </div>
@endsection
