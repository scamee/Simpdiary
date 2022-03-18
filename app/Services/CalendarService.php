<?php
/* original class file */

namespace app\Services;

use Carbon\Carbon;
use App\Models\Tag;

class CalendarService
{
    /**
     * カレンダーデータを返却する
     *
     * @return array
     */
    public function getWeeks()
    {
        $weeks = [];
        $week = '';

        $dt = new Carbon(self::getYm_firstday());
        $day_of_week = $dt->dayOfWeek;     // 曜日
        $days_in_month = $dt->daysInMonth; // その月の日数

        // 第 1 週目に空のセルを追加
        $week .= str_repeat('<td></td>', $day_of_week);

        for ($day = 1; $day <= $days_in_month; $day++, $day_of_week++) {
            $date = self::getYm() . '-' . $day;

            if (self::getNow() === $date) {
                $week .= '<td class="today"><a href="/show/' . $date . '">' . $day;
            } else {
                $week .= '<td><a href="/show/' . $date . '">' . $day;
                /* $week .= '<td><a data-bs-toggle="modal" data-bs-target="#MyListModel" href="/show/' . $date . '">' . $day; */
            }
            $week .= '</a></td>';

            // 週の終わり、または月末
            if (($day_of_week % 7 === 6) || ($day === $days_in_month)) {
                if ($day === $days_in_month) {
                    $week .= str_repeat('<td></td>', 6 - ($day_of_week % 7));
                }
                $weeks[] = '<tr>' . $week . '</tr>';
                $week = '';
            }
        }
        return $weeks;
    }

    /**
     * month 文字列を返却する
     *
     * @return string
     */
    public function getMonth()
    {
        return Carbon::parse(self::getYm_firstday())->format('Y年n月');
    }

    /**
     * prev 文字列を返却する
     *
     * @return string
     */
    public function getPrev()
    {
        return Carbon::parse(self::getYm_firstday())->subMonthsNoOverflow()->format('Y-m-j');
    }

    /**
     * next 文字列を返却する
     *
     * @return string
     */
    public function getNext()
    {
        return Carbon::parse(self::getYm_firstday())->addMonthNoOverflow()->format('Y-m-j');
    }

    /**
     *
     *
     * @return string
     */
    public function getNow()
    {
        return Carbon::now()->format('Y-m-j');
    }

    /**
     * GET から Y-m フォーマットを返却する
     *
     * @return string
     */
    private static function getYm()
    {
        $currentroute = \Route::currentRouteName();
        $setroutes = self::set_routes();

        foreach ($setroutes as $setroute) {
            if ($currentroute === $setroute) {
                $url = $_SERVER['REQUEST_URI'];
                //urlから日記の日付を取得
                $url = rtrim($url, '/');
                $date = substr($url, strrpos($url, '/') + 1);
                //日付($date)から年・月のみ取得
                //2021-04-1 -> 2021-04
                return substr($date, 0, 7);
            }
        }
        return Carbon::now()->format('Y-m');
    }

    private static function set_routes()
    {
        return ['create', 'show', 'edit'];
    }

    /**
     * 2019-09-01 のような月初めの文字列を返却する
     *
     * @return string
     */
    private static function getYm_firstday()
    {
        return self::getYm() . '-01';
    }

    /**
     *今日の日付と$set_dayの日数差を取得する
     *
     * @return string
     */
    /* public function diffDay1($set_day)
    {

        $set_day = new Carbon($set_day);
        $today = new Carbon(self::getNow());

        return $set_day->diffInDays($today);
    } */

    /**
     *今日の日付と$set_dayの日数差を取得する
     *
     * @return string
     */
    public function diffDay()
    {
        $test = [];
        $tagModel = new Tag();
        $tags =  $tagModel->where('user_id', \Auth::id())->get();

        /* dd($tags); */
        if (isset($tags)) {
            foreach ($tags as $tag) {
                /* var_dump($tag['set_day']); */
                $set_day = new Carbon($tag['set_day']);
                /* dd($set_day); */
                $today = new Carbon(self::getNow());

                $test[] = $set_day->diffInDays($today);
            }
            /* dd($test); */
            return $test;
        }
    }
}
