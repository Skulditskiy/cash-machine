#!/usr/bin/env php
<?php

require dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

// ... register commands

try {
    $application->run();
} catch (\Exception $exception) {
    return -1;
}