<div class="card-body py-2 px-4">
    {{-- <div class="calendar-btn">
        <a class="prev-btn" href="{{ $prev }}">&lt;</a>
        <h2 style="display:inline-block; margin: 0 10px;">{{ $month }}</h2>
        <a class="next-btn" href="{{ $next }}">&gt;</a>
    </div> --}}
    <table class="table table-bordered">
        <tr>
            <th colspan="7">
                <div class="calendar-btn">
                    <a class="prev-btn submit-btn" href="{{ $prev }}">&lt;</a>
                    <h2 style="display:inline-block; margin: 0 10px;">{{ $month }}</h2>
                    <a class="next-btn submit-btn" href="{{ $next }}">&gt;</a>
                </div>
            </th>
        </tr>
        <tr>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>
        @foreach ($weeks as $week)
            {!! $week !!}
        @endforeach
    </table>
    @include('components.tag')
</div>
