<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\AreaComposers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AreaComposers::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         View::composer('*', AreaComposers::class);
    }
}
