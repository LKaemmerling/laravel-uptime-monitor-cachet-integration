<?php

namespace LKDevelopment\UptimeMonitorCachetIntegration\Listener;

use Illuminate\Contracts\Events\Dispatcher;
use LKDevelopment\UptimeMonitorCachetIntegration\Enums\Incident;
use LKDevelopment\UptimeMonitorCachetIntegration\Helpers\CachetApiHelper;

/**
 * Class LaravelUptimeMonitorEventSubscriber.
 */
class LaravelUptimeMonitorEventSubscriber
{
    /**
     * @param $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(config('laravel-uptime-monitor-cachet-integration.issueableEvents'), function ($event) {
            $helper = new CachetApiHelper();
            $helper->sendIncident(Incident::parse($event->monitor, class_basename($event)));
        });
    }
}