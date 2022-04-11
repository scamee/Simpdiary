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

                //初期値
                $date = Calendar::getNow();

                $tagModel = new Tag();
                $tags =  $tagModel->where('user_id', \Auth::id())->get();

                $view->with('user', $user)->with('tags', $tags)->with('date', $date)->with(
                    [
                        'weeks'         => Calendar::getWeeks(),
                        'month'         => Calendar::getMonth(),
                        'prev'          => Calendar::getPrev(),
                        'next'          => Calendar::getNext(),
                        'diff'          => Calendar::diffDay(),
                    ]
                );
            }
        );
    }
}
