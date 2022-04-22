<?php

namespace App\Providers;

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
        $this->app->bind('phoneNumbersValidator', function ($app) {
            return $app->config->get('countries.phone_numbers_validator') ?: 'No such a phone number exists.';
        });

        //
    }
}
