<?php

namespace App\Providers;

use App\Facades\Calendar;
use app\Services\CalendarService;
use Illuminate\Support\ServiceProvider;

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

                $view->with('user', $user)->with(
                    [
                        'weeks'         => Calendar::getWeeks(),
                        'month'         => Calendar::getMonth(),
                        'prev'          => Calendar::getPrev(),
                        'next'          => Calendar::getNext(),
                        'diff'          => Calendar::diffDay()
                    ]
                );
            }
        );
    }
}
