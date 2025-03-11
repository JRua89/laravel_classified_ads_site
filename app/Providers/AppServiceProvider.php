<?php

namespace App\Providers;
use App\Models\Area;
use App\Models\Category;
use Illuminate\Support\Str;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Area::creating(function ($area) {
            $prefix = $area->parent ? $area->parent->name . ' ' : '';
            $area->slug = Str::slug($prefix . $area->name);
        });

        Category::creating(function ($category) {
            $prefix = $category->parent ? $category->parent->name . ' ' : '';
            $category->slug = Str::slug($prefix . $category->name);
        });
    }
}
