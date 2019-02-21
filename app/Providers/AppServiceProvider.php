<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // App::bind(App\Repositories\PrinterInterface::class,App\Repositories\PrinterRepositoryMongo::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
