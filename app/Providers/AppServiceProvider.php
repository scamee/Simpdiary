<?php

namespace App\Providers;

use App\Facades\Calendar;
use app\Services\CalendarService;
use Illuminate\Support\ServiceProvider;
use App\Models\Tag;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CalendarService::class, CalendarService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            '*',
            function ($view) {

                $user = \Auth::user();

                $tags = Tag::where('user_id', $user['id'])->get();

                $set_day1 = $tags[0]['set_day'];
                $set_day2 = $tags[1]['set_day'];

                $view->with('user', $user)->with('tags', $tags)->with(
                    [
                        'weeks'         => Calendar::getWeeks(),
                        'month'         => Calendar::getMonth(),
                        'prev'          => Calendar::getPrev(),
                        'next'          => Calendar::getNext(),
                        'diff1'          => Calendar::diffDay1($set_day1),
                        'diff2'          => Calendar::diffDay2($set_day2)
                    ]
                );
            }
        );
    }
}
