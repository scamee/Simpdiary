<?php

namespace App\Providers;

use App\Facades\Calendar;
use app\Services\CalendarService;
use Illuminate\Support\ServiceProvider;
use App\Models\User;


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

                if (\Auth::check()) {

                    $user = \Auth::user();

                    //共有しているか
                    $partner = "";
                    if (isset($user['partner_id'])) {
                        $partner_id = $user->partner_id;
                        $partner = USER::where('id', $partner_id)->first();
                    }

                    //カラーテーマ
                    //デフォルトカラーstyle.css
                    $theme_css = 'style.css';

                    $theme = $user->theme;
                    //ダークカラーdark-theme.css
                    if ($theme === User::THEME_DARK) {

                        $theme_css = 'dark-theme.css';
                    }

                    $view->with('user', $user)->with('partner', $partner)->with('theme_css', $theme_css)->with(
                        [
                            'weeks'         => Calendar::getWeeks(),
                            'month'         => Calendar::getMonth(),
                            'prev'          => Calendar::getPrev(),
                            'next'          => Calendar::getNext(),
                            'diff'          => Calendar::diffDay(),
                        ]
                    );
                }
            }
        );
    }
}
