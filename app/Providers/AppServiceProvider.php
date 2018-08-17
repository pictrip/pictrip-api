<?php

namespace App\Providers;

use FoursquareApi;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFoursquare();
    }

    private function registerFoursquare()
    {
        $api = new FoursquareApi(config('foursquare.client_id'), config('foursquare.client_secret'));

        $this->app->instance(FoursquareApi::class, $api);
    }
}
