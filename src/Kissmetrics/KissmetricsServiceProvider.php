<?php
namespace TagVenue\Kissmetrics;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class KissmetricsServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/kissmetrics.php' => base_path('config/kissmetrics.php')
        ]);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('kissmetrics', function()
        {
            $apiKey = Config::get('kissmetrics.api_key');
            return new Kissmetrics($apiKey);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['kissmetrics'];
    }
}