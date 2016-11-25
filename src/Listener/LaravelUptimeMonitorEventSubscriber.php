<?php
namespace LKDevelopment\UptimeMonitorCachetIntegration\Listener;
use LKDevelopment\UptimeMonitorCachetIntegration\Enums\Incident;
use LKDevelopment\UptimeMonitorCachetIntegration\Helpers\CachetApiHelper;

/**
 * Class LaravelUptimeMonitorEventSubscriber
 * @package LKDevelopment\UptimeMonitorCachetIntegration\Listener
 */
class LaravelUptimeMonitorEventSubscriber
{
    /**
     * @param $events
     */
    public function subscribe($events){
        $events->listen(config('laravel-uptime-monitor-cachet-integration.issueableEvents'),function($event, CachetApiHelper $helper){
            $helper->sendIncident(Incident::parse($event->monitor,get_class($event)));
        });
    }
}