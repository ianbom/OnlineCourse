<?php

namespace App\Providers;

use App\Http\View\Composers\SidebarComposers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('web.layouts.sidebar_baca', SidebarComposers::class);
    }
}
