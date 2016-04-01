<?php

namespace Bpocallaghan\Alert;

use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'alert');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/alert')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('alert', function ()
        {
            return $this->app->make('Bpocallaghan\Alert\Alert');
        });
    }
}
