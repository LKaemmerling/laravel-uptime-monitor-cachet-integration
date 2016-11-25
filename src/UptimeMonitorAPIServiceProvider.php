<?php

namespace LKDevelopment\UptimeMonitorCachetIntegration;

use Illuminate\Support\ServiceProvider;
use LKDevelopment\UptimeMonitorCachetIntegration\Listener\LaravelUptimeMonitorEventSubscriber;

/**
 * Class UptimeMonitorCachetIntegrationServiceProvider.
 */
class UptimeMonitorAPIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-uptime-monitor-cachet-integration.php' => config_path('laravel-uptime-monitor-cachet-integration.php'),
        ], 'config');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-uptime-monitor-cachet-integration');
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-uptime-monitor-cachet-integration'),
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-uptime-monitor-cachet-integration.php', 'laravel-uptime-monitor-cachet-integration');
        $this->app['events']->subscribe(LaravelUptimeMonitorEventSubscriber::class);
    }
}
