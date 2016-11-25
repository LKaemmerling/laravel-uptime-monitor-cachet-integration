<?php
namespace LKDevelopment\UptimeMonitorCachetIntegration\Helpers;

use Damianopetrungaro\CachetSDK\CachetClient;
use LKDevelopment\UptimeMonitorCachetIntegration\Enums\Incident;

class CachetApiHelper
{
    protected $cachetClient;

    public function __construct()
    {
        $this->cachetClient = new CachetClient(config('laravel-uptime-monitor-cachet-integration.endpoint'), config('laravel-uptime-monitor-cachet-integration.token'));
    }

    public function sendIncident(Incident $incident){

    }
}