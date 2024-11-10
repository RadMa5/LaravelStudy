<?php

namespace App\Providers;

use App\Observers\NewsObserver;
use Illuminate\Support\ServiceProvider;
Use App\Models\News;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        News::observe(NewsObserver::class);
    }
}
