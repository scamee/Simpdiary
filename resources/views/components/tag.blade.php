<div id="tags">
    {{-- <div class="card-body bg-transparent p-0"> --}}
    {{-- <h4 class="card-title">ウィジェット</h4> --}}
    {{-- <button class="btn btn-outline-primary" data-bs-target="#TagSettingModel" data-bs-toggle="modal">
        <i class="me-1 fa-solid fa-pen"></i>
    </button> --}}
    {{-- </div> --}}
    {{-- <div class="card-footer bg-transparent p-0"> --}}
    <div class="row m-0">
        <div class="col-6 px-1">
            <div class="card card-body tag p-0">
                {{ $tag1->title }}<br>
                <span style="font-size:35px;">{{ $diff[0] }}</span>Days
            </div>
        </div>
        <div class="col-6 px-1">
            <div class="card card-body tag p-0">
                {{ $tag2->title }}<br>
                <span style="font-size:35px;">{{ $diff[1] }}</span>Days
            </div>
        </div>
    </div>
    {{-- </div> --}}
</div>
