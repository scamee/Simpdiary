@extends('layouts.app')

@section('content')
    <div class="card-header">
        <span class="month" style="width:150px;">
            {{ $date }}
        </span>
    </div>

    {{-- 日記が登録されていれば表示。そうでなければ「日記書こう」 --}}
    @if (!empty($diary))
        <div class="card-body py-2 px-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="list-style: none;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method='POST' action="/update" enctype="multipart/form-data">
                @csrf
                <input type='hidden' name='diary_date' value="{{ $date }}">
                <div class="form-group col-10 mx-auto">
                    <label for="titleform" class="form-label fs-4 text-primary m-0">タイトル</label>
                    <input type="text" class="form-control m-2" id="titleform" name="title" value="{{ $diary->title }}">
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
                        <option value="1" {{ $diary->health_id == 1 ? 'selected' : '' }}>
                            良い
                        </option>
                        <option value="2" {{ $diary->health_id == 2 ? 'selected' : '' }}>
                            普通
                        </option>
                        <option value="3" {{ $diary->health_id == 3 ? 'selected' : '' }}>
                            悪い
                        </option>
                    </select>
                    @error('select')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-10 mx-auto">
                    <label for="content" class="form-label fs-4 text-primary m-0">本文</label>
                    <textarea name='content' class="form-control m-2" rows="10" id="content">{{ $diary->content }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-10 mx-auto">
                    <label for="imageform" class="form-label fs-4 text-primary m-0">画像を追加</label>
                    <input type="file" id="imageform" class="form-control m-2" name="diary_img"
                        accept="image/png, image/jpeg">
                </div>
                <input type='submit' class=" col-10 mx-auto d-block btn btn-outline-primary btn-lg" value="保存">
            </form>
        </div>
    @else
        <div class="card-body py-2 px-4 mx-auto text-center align-middle">
            <h3 class="mx-auto text-center align-middle">日記の記載がありません。日記書こう!!</h3>
            <div class="d-block">
                <a href="{{ route('create', ['date' => $date]) }}" class="btn btn-outline-primary btn-lg">日記を書く</a>
            </div>
        </div>
    @endif
    </div>
@endsection
