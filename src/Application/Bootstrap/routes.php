<?php

use CashMachine\Application\Bootstrap\DiKeys;

$application->post(
    '/cashMachine/withdraw',
    function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response) use ($container) {
        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $container->get(DiKeys::WITHDRAW_CONTROLLER)->execute($request, $response);
        return $response->withHeader('Content-Type', 'application/json');
    }
);

$application->get(
    '/',
    function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response) use ($container) {
        /** @var \Slim\Views\Twig $view */
        $view = $container->get(\CashMachine\Application\Bootstrap\DiKeys::VIEW);
        return $view->render(
            $response,
            'Dashboard/index.twig',
            $container->get(\CashMachine\Application\Bootstrap\DiKeys::INDEX_CONTROLLER)->execute($request, $response)
        );
    }
);
