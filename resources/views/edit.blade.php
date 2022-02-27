@extends('layouts.app')

@section('content')
    <div class="col-md-6 p-0">
        <div class="card">
            <div class="card-header">
                <span class="fw-bold">
                    {{ $date }}
                </span>
                の日記
            </div>
            <div class="card-body">
                <form method='POST' action="/store">
                    @csrf
                    <input type='hidden' name='diary_date' value="{{ $date }}">
                    <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                    <div class="form-group">
                        <label for="titleform" class="form-label">タイトル</label>
                        <input type="text" class="form-control" id="titleform" name="title">
                    </div>
                    <div class="form-group">
                        <label for="selectform" class='form-label'>体調</label>
                        <select id='selectform' class='form-control' name='select'>
                            <option value="" style="display: none;">
                                --選択してください--
                            </option>
                            <option value="1">
                                良い
                            </option>
                            <option value="2">
                                普通
                            </option>
                            <option value="3">
                                悪い
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label">本文</label>
                        <textarea name='content' class="form-control" rows="10" id="content"></textarea>
                    </div>
                    <button type='submit' class="btn btn-outline-primary btn-lg">保存</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="card-header">
                header
            </div>
            <div class="card-body">
                body
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="card-header">
                header
            </div>
            <div class="card-body">
                body
            </div>
        </div>
    </div>
@endsection
