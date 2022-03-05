@extends('layouts.app')

@section('content')
    <div class="card-header">
        <span class="month" style="width:150px;">
            {{ $date }}
        </span>
    </div>
    <div class="card-body">
        <form method='POST' action="/store">
            @csrf
            <input type='hidden' name='diary_date' value="{{ $date }}">
            <input type='hidden' name='user_id' value="{{ $user['id'] }}">
            <div class="form-group col-10 mx-auto">
                <label for="titleform" class="form-label fs-4 text-primary m-0">タイトル</label>
                <input type="text" class="form-control m-2" id="titleform" name="title">
            </div>
            <div class="form-group col-10 mx-auto">
                <label for="selectform" class='form-label fs-4 text-primary m-0'>体調</label>
                <select id='selectform' class='form-control m-2' name='select'>
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
            <div class="form-group col-10 mx-auto">
                <label for="content" class="form-label fs-4 text-primary m-0">本文</label>
                <textarea name='content' class="form-control m-2" rows="10" id="content"></textarea>
            </div>
            <input type='submit' class="btn btn-outline-primary btn-lg" value="保存">
        </form>
    </div>
@endsection
