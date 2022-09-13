<?php

namespace App\Providers;

use App\Jobs\GetNews;
use App\Services\GetNewsService;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $news = new GetNewsService();
//        View::share('news', $news->execute());
    }
}
