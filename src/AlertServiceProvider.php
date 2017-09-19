<?php

namespace Bpocallaghan\Alert;

use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

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
        // singleton
        $this->app->singleton('alert', function () {
            return $this->app->make(Alert::class);
        });
    }
}
