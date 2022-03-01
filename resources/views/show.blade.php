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
                {{-- url("{{$diaries->diary_date}}/edit") --}}
                dd({{ $date }});
                <button href="{{ route('edit', ['date' => $date]) }}" class="btn btn-outline-primary btn-lg">編集</button>

                {{-- 現在のURL取得 --}}
                {{-- @php
                    $current_url = Request::url();
                    dd($current_url);
                @endphp --}}

                {{-- 日記が登録されていれば表示。そうでなければ「日記書こう」 --}}
                @if (!empty($diary))
                    <h3 class="m-0">タイトル</h3>
                    <p>{{ $diary->title }}</p>

                    <h3 class="m-0">体調</h3>
                    @if ($diary->health === 1)
                        <p>良い</p>
                    @elseif ($diary->health === 2)
                        <p>普通</p>
                    @else
                        <p>悪い</p>
                    @endif

                    <h3 class="m-0">日記本文</h3>
                    <p>{{ $diary->content }}</p>
                @else
                    <p>日記書こう</p>
                @endif
            </div>

        </div>

    </div>
    {{-- 記念日まで後●日 --}}
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="card-header">
                header
            </div>
            <div class="card-body">
                記念日まで後●日
            </div>
        </div>
    </div>
@endsection
