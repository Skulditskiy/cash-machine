#!/usr/bin/env php
<?php

require dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';
require dirname(dirname(dirname(__DIR__))) . '/src/Application/Bootstrap/dependencies.php';
use Symfony\Component\Console\Application;

$consoleApplication = new Application();

try {
    $consoleApplication->add(
        $application->getContainer()->get(\CashMachine\Application\Bootstrap\DiKeys::WITHDRAW_COMMAND)
    );
} catch (\Psr\Container\NotFoundExceptionInterface $e) {
} catch (\Psr\Container\ContainerExceptionInterface $e) {
}

try {
    $consoleApplication->run();
} catch (\Exception $exception) {
    return -1;
}