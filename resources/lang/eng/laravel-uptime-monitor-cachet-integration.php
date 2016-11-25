<?php
return [
    'incident' => [

        Spatie\UptimeMonitor\Events\UptimeCheckFailed::class => [
            'name' => ':url seems to be down',
            'message' => ':url is down since :date'
        ]
    ]

];