@extends('layouts.app')

@section('content')
    <div class="col-md-6 p-0">

        <div class="card">

            <div class="card-header">
                <span class="month" style="width:150px;">
                    {{ $date }}
                </span>
            </div>

            <div class="card-body py-2 px-4">
                {{-- url("{{$diaries->diary_date}}/edit") --}}
                {{-- dd({{ url()->current() }}); --}}
                <div class="d-block">
                    <button href="{{ route('edit', ['date' => $date]) }}"
                        class="btn btn-outline-primary btn-lg float-end">編集</button>
                </div>

                {{-- 現在のURL取得 --}}
                {{-- @php
                    $current_url = Request::url();
                    dd($current_url);
                @endphp --}}

                {{-- 日記が登録されていれば表示。そうでなければ「日記書こう」 --}}
                @if (!empty($diary))
                    <div class="mx-auto col-10">
                        <div class="border-bottom border-primary mb-3">
                            <h4 class="m-0">タイトル</h4>
                            <h3 class="col-8 mx-auto text-center">{{ $diary->title }}</h3>
                        </div>
                        <div class="border-bottom border-primary mb-3">
                            <h4 class="m-0">体調</h4>
                            @if ($diary->health === 1)
                                <h3 class="col-8 mx-auto text-center">良い</h3>
                            @elseif ($diary->health === 2)
                                <h3 class="col-8 mx-auto text-center">普通</h3>
                            @else
                                <h3 class="col-8 mx-auto text-center">悪い</h3>
                            @endif
                        </div>
                        <div class="border-bottom border-primary mb-3">
                            <h4 class="m-0">日記本文</h4>
                            <h3 class="col-8 mx-auto text-center">{{ $diary->content }}</h3>
                        </div>
                    </div>
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
