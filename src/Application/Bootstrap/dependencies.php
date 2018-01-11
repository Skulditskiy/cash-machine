<?php

$container = new \Slim\Container([
    'settings' => [
        'displayErrorDetails' => true,
    ],
]);

define('PROJECT_PATH', dirname(dirname(dirname(__DIR__))));

$container[\CashMachine\Application\Bootstrap\DiKeys::WITHDRAW_CONTROLLER] = function () {
    return new \CashMachine\Application\Controllers\WithdrawController();
};

$application = new \Slim\App($container);