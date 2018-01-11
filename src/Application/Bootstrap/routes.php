<?php

use CashMachine\Application\Bootstrap\DiKeys;

$application->post(
    '/cashMachine/withdraw',
    function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response) use ($container) {
        return $container->get(DiKeys::WITHDRAW_CONTROLLER)->execute($request, $response);
    }
);

$application->get(
    '/',
    function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response) use ($container) {

    }
);