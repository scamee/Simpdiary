@extends('layouts.app')

@section('content')
    <div class="card-body py-2 px-4 form-container mx-auto">

        <div class="menu-list">
            <div class="dropdown dropend float-start">
                <a class="btn submit-btn dropdown-toggle" href="#" role="button" id="dropdownDiary" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-gear"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownDiary">
                    <li>
                        <a class="dropdown-item" href="{{ route('edit', ['date' => $date]) }}">
                            <i class="me-1 fa-solid fa-pen"></i>日記を編集
                        </a>
                    </li>
                    <li>
                        <button class="dropdown-item" type="button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropDanger">
                            <i class="me-1 fa-solid fa-trash-can"></i>日記を削除
                        </button>
                    </li>
                </ul>
            </div>
            @include('modal.danger')
            @if (isset($partner_diary))
                <a class="btn submit-btn diary-link" href="{{ route('partnerShow', ['date' => $date]) }}">相手の日記を見る</a>
            @endif
        </div>


        <h2 class="diary-info" style="display: block;">
            {{ $user->name }}の日記
        </h2>
        <h4 class="diary-info" style="display: block;">
            日付：{{ $diary->diary_date }}
            <br>
            <span>
                記入日：{{ $diary->created_at->format('Y-m-d') }}
                更新日：{{ $diary->updated_at->format('Y-m-d') }}
            </span>
        </h4>


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
                <h4 class="show-title">画像</h4>
                <p>画像をクリックまたはタッチで拡大できます</p>
                @foreach ($images as $image)
                    <div class="img-thumbnail show-img-container" data-bs-target="#image_Modal<?php echo $i; ?>"
                        data-bs-toggle="modal">
                        <img class="show-img" src="{{ Storage::url($image->file_path) }}" />
                        {{-- <p class="show-img-name">{{ $image->file_name }}</p> --}}
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
