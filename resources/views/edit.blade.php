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
                <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                <div class="form-group">
                    <label for="titleform" class="form-label">タイトル</label>
                    <input type="text" class="form-control" id="titleform" name="title" value="{{ $diary->title }}">
                </div>
                <div class="form-group">
                    <label for="selectform" class='form-label'>体調</label>
                    <select id='selectform' class='form-control' name='select'>
                        <option value="{{ $diary->health_id }}" {{ $diary->health_id == 1 ? 'selected' : '' }}>
                            良い
                        </option>
                        <option value="{{ $diary->health_id }}" {{ $diary->health_id == 2 ? 'selected' : '' }}>
                            普通
                        </option>
                        <option value="{{ $diary->health_id }}" {{ $diary->health_id == 3 ? 'selected' : '' }}>
                            悪い
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content" class="form-label">本文</label>
                    <textarea name='content' class="form-control" rows="10" id="content">{{ $diary->content }}</textarea>
                </div>
                <input type="file" name="image"><br>
                <button type="submit" class="btn btn-outline-primary btn-lg">保存</button>
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
