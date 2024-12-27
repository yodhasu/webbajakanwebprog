<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [
    'default' => env('LOG_CHANNEL', 'null'),
    'channels' => [
        'null' => [
            'driver' => 'null',
        ],
    ],
];
