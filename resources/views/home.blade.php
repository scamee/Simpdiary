@extends('layouts.app')

@section('content')

    <div class="col-md-6 p-0">
        <div class="card h-100">
            <div class="card-header d-flex">メモ一覧
                <a class='ml-auto' href='/create'>
                    <i class="fas fa-plus-circle">
                    </i>
                </a>
            </div>
            <div class="card-body p-2">
                見たい日記の日付を選択してね
            </div>
        </div>
    </div>
@endsection
