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
                @if($diaries)
                    if
                @else
                    <p>{{ $diaries[0]['title'] }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="card-header">
                header
            </div>
            <div class="card-body">
                body
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="card-header">
                header
            </div>
            <div class="card-body">
                body
            </div>
        </div>
    </div>
@endsection
