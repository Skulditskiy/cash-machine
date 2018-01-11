<?php

namespace CashMachine\Application\Controllers;

use CashMachine\Domain\CashMachine\WithdrawServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class WithdrawController
{
    /**
     * @var WithdrawServiceInterface
     */
    private $withdrawService;

    public function __construct(WithdrawServiceInterface $withdrawService)
    {
        $this->withdrawService = $withdrawService;
    }

    public function indexAction(ServerRequestInterface $request, ResponseInterface $response)
    {
        $amount = $request->getParsedBody();
        print_r($amount);
        return [];
    }
}
