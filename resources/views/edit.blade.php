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
                    <label for="titleform" class="form-label fs-4 m-0">タイトル</label>
                    <input type="text" class="form-control" id="titleform" name="title"
                        value="{{ old('title', $diary->title) }}">
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
                    <label for="content" class="form-label fs-4 m-0">本文</label>
                    <textarea name='content' class="form-control" rows="10"
                        id="content">{{ old('content', $diary->content) }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imageform" class="form-label fs-4 m-0">画像を追加</label>
                    <input type="file" id="imageform" class="form-control" name="diary_img"
                        accept="image/png, image/jpeg">
                </div>
                <input type='submit' class="col-12 mx-auto d-block btn btn-lg submit-btn" value="保存">
            </form>
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
