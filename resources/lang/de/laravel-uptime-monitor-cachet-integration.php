<?php
return [
    'incident' => [
        Spatie\UptimeMonitor\Events\UptimeCheckFailed::class => [
            'name' => ':url ist nicht mehr erreichbar',
            'message' => ':url ist nicht erreichbart seit :date'
        ]
    ]
];