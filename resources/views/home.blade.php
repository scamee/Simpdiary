@extends('layouts.app')

@section('content')

    <div class="col-md-2 p-0">
        <div class="card h-100">
            <div class="card-header d-flex">メモ一覧
                <a class='ml-auto' href='/create'>
                    <i class="fas fa-plus-circle">
                    </i>
                </a>
            </div>
            <div class="card-body p-2">
            </div>
        </div>
    </div>
    <div class="col-md-2 p-0">
        <div class="card h-100">
            <div class="card-header d-flex">月</div>
            <div class="card-body">
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
    <div class="col-md-6 p-0">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                <form method='POST' action="/store">
                    @csrf
                    <input type='hidden' name='user_id' {{-- value="{{ $user['id'] }}" --}}>
                    <div class="form-group">
                        <textarea name='content' class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tag">タグ</label>
                        <input name='tag' type="text" class="form-control" id="tag" placeholder="タグを入力">
                    </div>
                    <button type='submit' class="btn btn-outline-primary btn-lg">保存</button>
                </form>
            </div>
        </div>
    </div>
@endsection
