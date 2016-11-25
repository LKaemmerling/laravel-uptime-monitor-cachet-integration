<?php
namespace LKDevelopment\UptimeMonitorCachetIntegration\Helpers;

use Damianopetrungaro\CachetSDK\CachetClient;
use Damianopetrungaro\CachetSDK\Incidents\IncidentFactory;
use LKDevelopment\UptimeMonitorCachetIntegration\Enums\Incident;

/**
 * Class CachetApiHelper
 * @package LKDevelopment\UptimeMonitorCachetIntegration\Helpers
 */
class CachetApiHelper
{
    /**
     * @var CachetClient
     */
    protected $cachetClient;

    /**
     * CachetApiHelper constructor.
     */
    public function __construct()
    {
        $this->cachetClient = new CachetClient(config('laravel-uptime-monitor-cachet-integration.endpoint'), config('laravel-uptime-monitor-cachet-integration.token'));
    }

    /**
     * @param Incident $incident
     * @return bool
     */
    public function sendIncident(Incident $incident)
    {

        $incidentManager = IncidentFactory::build($this->cachetClient);
        $incidentManager->storeIncident($incident->toArray());

        return true;
    }
}