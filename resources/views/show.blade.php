@extends('layouts.app')

@section('content')

    <div class="card-body py-2 px-4 form-container mx-auto">
        @if ($diary->status == 2)
            <h2 class="draught" style="display:block;background-color:">
                下書き
            </h2>
        @endif
        <div class="menu-list">
            {{-- メニュー --}}
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
        {{-- 日記のユーザーの名前 --}}
        <h2 class="diary-info" style="display:block;morgin:0 auto;">
            {{ $user->name }}の日記
        </h2>
        {{-- 日付 --}}

        <div style="display:flex;justify-content:space-between;">
            <h4 style="display:inline-block;">
                日付：{{ $diary->diary_date }}
                <br>
                <span style="font-size:0.8rem;">
                    記入日：{{ $diary->created_at->format('Y-m-d') }}
                    <br>
                    更新日：{{ $diary->updated_at->format('Y-m-d') }} </span>
            </h4>
            {{-- 天気 --}}
            <h4 style="display:inline-block;">
                天気 :
                @foreach (ConstList::WEATHER_LIST as $name => $number)
                    @if ($diary->weather_id == $number)
                        <span>{{ $name }}</span>
                    @endif
                @endforeach
            </h4>
        </div>

        <hr>
        {{-- タイトル --}}
        <div class="show-list-container" style="margin-top:10px;">
            <div class="show-list" style="width:100%;">
                <h4 class="show-title">タイトル :
                    <span>{{ $diary->title }}</span>
                </h4>
            </div>
        </div>
        <div class="show-list-container">
            {{-- 体調 --}}
            <div class="show-list" style="width:45%;display:inline-block;">
                <h4 class="show-title">体調 :
                    @foreach (ConstList::HEALTH_LIST as $name => $number)
                        @if ($diary->health_id === $number)
                            <span>{{ $name }}</span>
                        @endif
                    @endforeach
                </h4>
            </div>
            {{-- 気分 --}}
            <div class="show-list" style="width:45%;display:inline-block;">
                <h4 class="show-title">気分 :
                    @foreach (ConstList::MOOD_LIST as $name => $number)
                        @if ($diary->mood_id === $number)
                            <span>{{ $name }}</span>
                        @endif
                    @endforeach
                </h4>
            </div>
        </div>
        {{-- 本文 --}}
        <div class="show-list-container">
            <div class="show-list" style="width:100%;">
                <h4 class="show-title">日記本文</h4>
                <h3 class="show-item col-11 mx-auto">{!! nl2br(e($diary->content)) !!}</h3>
            </div>
        </div>
        {{-- 画像 --}}
        @if (!empty($images))
            <div class="m-0">
                <h4 class="show-title">画像</h4>
                <p>画像をクリックまたはタッチで拡大できます</p>
                @foreach ($images as $image)
                    <div class="img-thumbnail show-img-container" data-bs-target="#image_Modal{{ $image->id }}"
                        data-bs-toggle="modal">
                        <img class="show-img" src="{{ Storage::url($image->file_path) }}" />
                    </div>
                    @include('modal.image_modal')
                @endforeach
            </div>
        @endif
    </div>
@endsection
