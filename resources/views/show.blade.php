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
            <div class="d-block">
                <a href="{{ route('edit', ['date' => $date]) }}" class="btn btn-outline-primary btn-lg float-end">編集</a>
            </div>
            <div class="mx-auto col-10">
                <div class="border-bottom border-primary mb-3">
                    <h4 class="m-0 text-primary">タイトル</h4>
                    <h3 class="col-8 mx-auto text-center">{{ $diary->title }}</h3>
                </div>
                <div class="border-bottom border-primary mb-3">
                    <h4 class="m-0 text-primary">体調</h4>
                    @if ($diary->health_id === 1)
                        <h3 class="col-8 mx-auto text-center">良い</h3>
                    @elseif ($diary->health_id === 2)
                        <h3 class="col-8 mx-auto text-center">普通</h3>
                    @else
                        <h3 class="col-8 mx-auto text-center">悪い</h3>
                    @endif
                </div>
                <div class="border-bottom border-primary mb-3">
                    <h4 class="m-0 text-primary">日記本文</h4>
                    <h3 class="col-12 mx-auto text-center">{{ $diary->content }}</h3>
                </div>
            </div>
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
