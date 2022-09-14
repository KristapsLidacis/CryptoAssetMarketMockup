<?php

namespace App\Providers;

use App\Http\Controllers\NewsController;
use App\Services\GetNewsService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $test = new GetNewsService();

        View::share('news', $test->execute());
    }
}
