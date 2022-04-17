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
            <div class="d-flex flex-row-reverse bd-highlight mb-3">
                <form method='POST' action="/delete" id='delete-form'>
                    @csrf
                    <input type="hidden" name='diary_date' value="{{ $date }}">
                    <button type="submit" class="btn submit-btn ms-1"><i class="me-1 fa-solid fa-trash-can"></i>削除</button>
                </form>
                <div>
                    <a href="{{ route('edit', ['date' => $date]) }}" class="btn submit-btn">
                        <i class="me-1 fa-solid fa-pen"></i>編集
                    </a>
                </div>
            </div>
            <div class="mx-auto col-10">
                <div class="show-list">
                    <h4 class="show-title">タイトル</h4>
                    <h3 class="show-item-center col-8 mx-auto">{{ $diary->title }}</h3>
                </div>
                <div class="show-list">
                    <h4 class="show-title">体調</h4>
                    @if ($diary->health_id === 1)
                        <h3 class="show-item-center col-8 mx-auto">良好<i class="fa-solid fa-face-smile-beam"></i></h3>
                    @elseif ($diary->health_id === 2)
                        <h3 class="show-item-center col-8 mx-auto">いつも通り<i class="fa-solid fa-face-smile"></i></h3>
                    @else
                        <h3 class="show-item-center col-8 mx-auto">調子悪かった<i class="fa-solid fa-face-sad-tear"></i>
                        </h3>
                    @endif
                </div>
                <div class="show-list">
                    <h4 class="show-title">日記本文</h4>
                    <h3 class="show-item col-12 mx-auto">{!! nl2br(e($diary->content)) !!}</h3>
                </div>

                @if (!empty($images))
                    <div class="m-0">
                        @php
                            $i = 0;
                        @endphp
                        <p>画像をクリックまたはタッチで変更・削除ができます</p>
                        @foreach ($images as $image)
                            <div class="rounded float-start img-thumbnail" style="width: 50%;">
                                <a data-bs-target="#image_Modal<?php echo $i; ?>" data-bs-toggle="modal">
                                    <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"
                                        style="cursor:pointer;" />
                                </a>
                                <p class="show-img">{{ $image->file_name }}</p>
                            </div>
                            @include('modal.image_modal')
                            @php
                                ++$i;
                            @endphp
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="card-body py-2 px-4 mx-auto align-items-center d-flex flex-wrap">
            <a href="{{ route('create', ['date' => $date]) }}" class="btn submit-btn btn-lg">
                <i class="me-1 fa-solid fa-pen"></i>日記を書く
            </a>
        </div>
    @endif
    </div>
@endsection
