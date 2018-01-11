<?php

use Psr\Container\ContainerInterface;

$container = new \Slim\Container([
    'settings' => [
        'displayErrorDetails' => true,
    ],
]);

define('PROJECT_PATH', dirname(dirname(dirname(__DIR__))));

$container[\CashMachine\Application\Bootstrap\DiKeys::WITHDRAW_SERVICE] = function () {
    return new \CashMachine\Domain\CashMachine\WithdrawService();
};

$container[\CashMachine\Application\Bootstrap\DiKeys::WITHDRAW_COMMAND] = function (ContainerInterface $container) {
    return new \CashMachine\Application\Commands\Withdraw(
        $container->get(\CashMachine\Application\Bootstrap\DiKeys::WITHDRAW_SERVICE)
    );
};

$container[\CashMachine\Application\Bootstrap\DiKeys::WITHDRAW_CONTROLLER] = function (ContainerInterface $container) {
    return new \CashMachine\Application\Controllers\WithdrawController(
        $container->get(\CashMachine\Application\Bootstrap\DiKeys::WITHDRAW_SERVICE)
    );
};

$application = new \Slim\App($container);
