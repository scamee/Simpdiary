<div class="card-header">
    <a href="{{ $prev }}">&lt;</a>
    <span class="month">{{ $month }}</span>
    <a href="{{ $next }}">&gt;</a>
</div>
<div class="card-body py-2 px-4">
    <table class="table table-bordered">
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
</div>
