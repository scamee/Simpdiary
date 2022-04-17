<div id="tags">
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
</div>
