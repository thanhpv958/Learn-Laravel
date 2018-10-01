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
        // load
        $this->loadViewsFrom(__DIR__.'/views', 'timezones');

        // publish
        $this->publishes([
                __DIR__.'/views' => base_path('resources/views/laraveldaily/timezones'),
            ]);
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
