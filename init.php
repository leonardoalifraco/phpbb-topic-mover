<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('merge_um_pm');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/merge_um_pm.log', Logger::DEBUG));
