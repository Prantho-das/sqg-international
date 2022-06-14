<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\Slider;
use App\Models\Study;
use Illuminate\Pagination\Paginator;
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
         View::share('setting', Settings::first());
        Paginator::useBootstrap();
    }
}
