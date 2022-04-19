@extends('layouts.app')

@section('content')
    <div class="card-body py-2 px-4 form-container mx-auto">
        <h2 class="diary-info" style="display: block;">
            {{ $partner->name }}の日記
        </h2>
        <h4 class="diary-info" style="display: block;">
            日付：{{ $partner_diary->diary_date }}
            <br>
            <span>
                記入日：{{ $partner_diary->created_at->format('Y-m-d') }}
                更新日：{{ $partner_diary->updated_at->format('Y-m-d') }}
            </span>
        </h4>
        <div class="menu-list">
            @if (isset($my_diary))
                <a class="btn submit-btn diary-link" href="{{ route('show', ['date' => $date]) }}">自分の日記を見る</a>
            @else
                <a class="btn submit-btn diary-link" href="{{ route('create', ['date' => $date]) }}">自分の日記を書く</a>
            @endif
        </div>
        <div class="show-list">
            <h4 class="show-title">タイトル</h4>
            <h3 class="show-item-center col-8 mx-auto">{{ $partner_diary->title }}</h3>
        </div>
        <div class="show-list">
            <h4 class="show-title">体調</h4>
            @if ($partner_diary->health_id === 1)
                <h3 class="show-item-center col-8 mx-auto">良好<i class="fa-solid fa-face-smile-beam"></i></h3>
            @elseif ($partner_diary->health_id === 2)
                <h3 class="show-item-center col-8 mx-auto">いつも通り<i class="fa-solid fa-face-smile"></i></h3>
            @else
                <h3 class="show-item-center col-8 mx-auto">調子悪かった<i class="fa-solid fa-face-sad-tear"></i>
                </h3>
            @endif
        </div>
        <div class="show-list">
            <h4 class="show-title">日記本文</h4>
            <h3 class="show-item col-12 mx-auto">{!! nl2br(e($partner_diary->content)) !!}</h3>
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
@endsection
