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
                    <button type="submit" class="btn btn-outline-primary btn-lg ms-1"><i
                            class="me-1 fa-solid fa-trash-can"></i>削除</button>
                </form>
                <div>
                    <a href="{{ route('edit', ['date' => $date]) }}" class="btn btn-outline-primary btn-lg">
                        <i class="me-1 fa-solid fa-pen"></i>編集
                    </a>
                </div>
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

                <div class="m-0">
                    @foreach ($images as $image)
                        <div class="rounded float-start img-thumbnail" style="width: 50%;">
                            <a data-bs-target="#image_Modal" data-bs-toggle="modal">
                                <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"
                                    style="cursor:pointer;" />
                            </a>
                            <p class="m-0 text-center">{{ $image->file_name }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @else
        <div class="card-body py-2 px-4 mx-auto align-items-center d-flex flex-wrap">
            <a href="{{ route('create', ['date' => $date]) }}" class="btn btn-outline-primary btn-lg">
                <i class="me-1 fa-solid fa-pen"></i>日記を書く
            </a>
        </div>
    @endif
    </div>
    @if (!empty($image))
        <div class="modal fade" id="image_Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg modal-middle">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="Title">タグ設定</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ Storage::url($image->file_path) }}" width="80%" />
                    </div>
                    <p class="m-0 text-center">{{ $image->file_name }}</p>
                    <hr>
                    <form method='POST' action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="diary_img" accept="image/png, image/jpeg">
                        </div>
                        <input type='submit' class="d-block btn btn-outline-primary" value="画像を変更">
                    </form>
                    <form method='POST' action="/delete" id='delete-form'>
                        @csrf
                        <input type="hidden" name='diary_date' value="{{ $date }}">
                        <button type="submit" class="btn btn-outline-primary btn-lg ms-1"><i
                                class="me-1 fa-solid fa-trash-can"></i>削除</button>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
