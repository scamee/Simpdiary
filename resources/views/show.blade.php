@extends('layouts.app')

@section('content')
    {{-- 日記が登録されていれば表示。そうでなければ「日記書こう」 --}}
    @if (!empty($diary))
        <div class="card-body py-2 px-4 col-10 mx-auto">

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

            <div class="menu-list">
                <div class="dropdown dropend float-start">
                    <a class="btn submit-btn dropdown-toggle" href="#" role="button" id="dropdownDiary"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gear"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownDiary">
                        <li>
                            <a class="dropdown-item" href="{{ route('edit', ['date' => $date]) }}">
                                <i class="me-1 fa-solid fa-pen"></i>編集
                            </a>
                        </li>
                        <li>
                            <button class="dropdown-item" type="button" data-bs-toggle="modal"
                                data-bs-target="#staticBackdropDanger">
                                <i class="me-1 fa-solid fa-trash-can"></i>削除
                            </button>
                        </li>
                    </ul>
                </div>
                @include('modal.danger')
                @if (isset($user['partner_id']))
                    <a class="btn submit-btn diary-link" href="{{ route('partnerShow', ['date' => $date]) }}">相手の日記を見る</a>
                @endif
            </div>

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
    @else
        <div class="card-body py-2 px-4 mx-auto col-10" style="text-align:center;">
            <div style="margin: 50px 0;">
                <h3 class="diary-info">{{ $date }}の日記が記入されていません</h3>
                <a href="{{ route('create', ['date' => $date]) }}" class="btn submit-btn btn-lg d-block">
                    <i class="me-1 fa-solid fa-pen"></i>日記を書く
                </a>
            </div>
            @if (isset($partner_diary))
                <div style="margin-top:30px;">
                    <h3 class="diary-info">あなたのパートナーの日記が見つかりました</h3>
                    <a href="{{ route('partnerShow', ['date' => $date]) }}" class="btn submit-btn btn-lg d-block">
                        相手の日記を見る
                    </a>
                </div>
            @endif
        </div>
    @endif
    </div>
@endsection
