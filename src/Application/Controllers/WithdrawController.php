<?php

namespace CashMachine\Application\Controllers;

use CashMachine\Domain\CashMachine\NoteUnavailableException;
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

    public function execute(ServerRequestInterface $request, ResponseInterface $response)
    {
        $requestBody = $request->getParsedBody();

        try {
            if (!isset($requestBody['amount'])) {
                throw new \InvalidArgumentException();
            }
            $amount = intval($requestBody['amount']);
            if ($amount <= 0) {
                throw new \InvalidArgumentException();
            }
            $response->getBody()->write(json_encode($this->withdrawService->getBanknotesByAmount($amount)));
        } catch (\InvalidArgumentException $exception) {
            $response = $response->withStatus(400);
            $response->getBody()->write(json_encode(['error' => 'Provided amount is invalid']));
        } catch (NoteUnavailableException $exception) {
            $response = $response->withStatus(400);
            $response->getBody()->write(json_encode(['error' => 'CashMachine is unavailable to withdraw provided amount']));
        }

        return $response;
    }
}
