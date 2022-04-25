@extends('layouts.app')

@section('content')
    <div class="card-body py-2 px-4 form-container mx-auto">
        <div class="menu-list">
            @if (isset($my_diary))
                <a class="btn submit-btn diary-link" href="{{ route('show', ['date' => $date]) }}">自分の日記を見る</a>
            @else
                <p style="width:100%;text-align:center;">自分の日記が見つかりませんでした</p>
                <a class="btn submit-btn diary-link" href="{{ route('create', ['date' => $date]) }}"
                    style="display:block;width:100%;margin-bottom:20px;">自分の日記を書く</a>
            @endif
        </div>
        {{-- 日記のユーザーの名前 --}}
        <h2 class="diary-info" style="display:block;morgin:0 auto;">
            {{ $partner->name }}の日記
        </h2>
        {{-- 日付 --}}

        <div style="display:flex;justify-content:space-between;">
            <h4 style="display:inline-block;">
                日付：{{ $partner_diary->diary_date }}
                <br>
                <span style="font-size:0.8rem;">
                    記入日：{{ $partner_diary->created_at->format('Y-m-d') }}
                    <br>
                    更新日：{{ $partner_diary->updated_at->format('Y-m-d') }} </span>
            </h4>
            {{-- 天気 --}}
            <h4 style="display:inline-block;">
                天気 :
                @foreach (ConstList::WEATHER_LIST as $name => $number)
                    @if ($partner_diary->weather_id == $number)
                        <span>{{ $name }}</span>
                    @endif
                @endforeach
            </h4>
        </div>

        <hr>

        <div class="show-list-container" style="margin-top:10px;">
            {{-- タイトル --}}
            <div class="show-list" style="width:100%;">
                <h4 class="show-title">タイトル
                    <span>{{ $partner_diary->title }}</span>
                </h4>
            </div>
        </div>
        <div class="show-list-container">
            {{-- 体調 --}}
            <div class="show-list" style="width:45%;display:inline-block;">
                <h4 class="show-title">体調
                    @foreach (ConstList::HEALTH_LIST as $name => $number)
                        @if ($partner_diary->health_id === $number)
                            <span>{{ $name }}</span>
                        @endif
                    @endforeach
                </h4>
            </div>
            {{-- 気分 --}}
            <div class="show-list" style="width:45%;display:inline-block;">
                <h4 class="show-title">気分
                    @foreach (ConstList::MOOD_LIST as $name => $number)
                        @if ($partner_diary->mood_id === $number)
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
                <h3 class="show-item col-12 mx-auto">{!! nl2br(e($partner_diary->content)) !!}</h3>
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
