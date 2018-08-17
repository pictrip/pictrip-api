<?php

namespace App\Providers;

use FoursquareApi;
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
        //
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
