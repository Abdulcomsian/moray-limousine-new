<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Way\Generators\GeneratorsServiceProvider;
use Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production'){
            // $this->app->register(GeneratorsServiceProvider::class);
            // $this->app->register(MigrationsGeneratorServiceProvider::class);
        }
    }
}

