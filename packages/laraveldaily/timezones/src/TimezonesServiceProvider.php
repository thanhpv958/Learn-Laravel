<?php

namespace Laraveldaily\Timezones;

use Illuminate\Support\ServiceProvider;

class TimezonesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Laraveldaily\Timezones\TimezonesController');
    }
}
