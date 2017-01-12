<?php
/**
 * Created by PhpStorm.
 * User: lukaskammerling
 * Date: 26.11.16
 * Time: 13:34.
 */

namespace LKDevelopment\UptimeMonitorCachetIntegration\Tests\Cachet;

use Spatie\UptimeMonitor\Models\Monitor;
use Damianopetrungaro\CachetSDK\CachetClient;
use Spatie\UptimeMonitor\Events\UptimeCheckFailed;
use LKDevelopment\UptimeMonitorCachetIntegration\Enums\Incident;
use LKDevelopment\UptimeMonitorCachetIntegration\Tests\TestCase;
use LKDevelopment\UptimeMonitorCachetIntegration\Helpers\CachetApiHelper;

class UptimeMonitorEventSubscriberTest extends TestCase
{
    protected $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = new CachetClient('https://demo.cachethq.io/api/v1/', '9yMHsdioQosnyVK4iCVR'); // Token from https://github.com/damianopetrungaro/CachetSDK/blob/master/tests/Unit/ClientFactory.php#L36
    }

    /** @test */
    public function test_send_to_cachet()
    {
        $monitor = factory(Monitor::class)->create(['uptime_check_interval_in_minutes' => 5]);
        $helper = new CachetApiHelper($this->client);
        $incident = Incident::parse($monitor, UptimeCheckFailed::class);
        $return = $helper->sendIncident($incident);
        $this->assertEquals($incident->name, $return['data']['name']);
        $this->assertEquals($incident->message, $return['data']['message']);
    }
}
