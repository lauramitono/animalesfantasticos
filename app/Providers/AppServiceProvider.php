<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		//registro mi repositorio
        $this->app->bind(
            \App\Repositories\Contracts\CriaturaRepository::class,
            \App\Repositories\CriaturaRepository::class
        );
    }
}
