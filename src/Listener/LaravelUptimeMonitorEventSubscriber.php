<?php

namespace LKDevelopment\UptimeMonitorCachetIntegration\Listener;

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
    public function subscribe($events)
    {
        $events->listen(config('laravel-uptime-monitor-cachet-integration.issueableEvents'), function ($event) {
            $helper = new CachetApiHelper();
            $helper->sendIncident(Incident::parse($event->monitor, class_basename($event)));
        });
    }
}
