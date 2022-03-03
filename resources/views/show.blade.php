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
                    @if ($diary->health === 1)
                        <h3 class="col-8 mx-auto text-center">良い</h3>
                    @elseif ($diary->health === 2)
                        <h3 class="col-8 mx-auto text-center">普通</h3>
                    @else
                        <h3 class="col-8 mx-auto text-center">悪い</h3>
                    @endif
                </div>
                <div class="border-bottom border-primary mb-3">
                    <h4 class="m-0 text-primary">日記本文</h4>
                    <h3 class="col-12 mx-auto text-center">{{ $diary->content }}
                        昨日ローソンに行ったんだよね。
                        で、俺の前の40歳くらいの女性が三井住友VISAアミティエを出したんだよ。
                        そしたらバイト店員が
                        「し、少々お待ち下さい！すぐに店長を呼びつけます！」
                        って店の奥に走って行ったんだよ。
                        すぐさま店長が出てきて、その女性の前で土下座して
                        「誠に失礼いたしました！まさかステータスカードである三井住友VISAアミティエをお持ちのお客様だとは知らずに・・」
                        って汚い床に額を擦りつけてんだよ。するとその女性はハイヒールで店長の頭を踏んで
                        「本当、失礼だわ。私は三井住友VISAアミティエホルダーよ？その私がわざわざ汚いこの店に買い物に来てあげたのにバイト風情に接客させるなんて」
                        とか言いながらハイヒールを舐めさせてたよ。
                        後でセゾンVISAを持って並んでた俺は恥ずかしくてサイフにコッソリ戻したよ。
                        それにしても三井住友VISAカードのステータスって凄いよな～。
                        社会的地位の高い選ばれた人しか持てないらしいもんな。</h3>
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
