<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Way\Generators\GeneratorsServiceProvider;
use Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider;
use Illuminate\Pagination\Paginator;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
>>>>>>> 5758a8caf7b869ca45db07bf111a6915ec595f3a

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
<<<<<<< HEAD
        Schema::defaultStringLength(191);
=======
>>>>>>> 5758a8caf7b869ca45db07bf111a6915ec595f3a
        if ($this->app->environment() !== 'production'){
            // $this->app->register(GeneratorsServiceProvider::class);
            // $this->app->register(MigrationsGeneratorServiceProvider::class);
        }
    }
}

