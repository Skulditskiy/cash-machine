<?php

namespace CashMachine\Domain\CashMachine;

interface WithdrawServiceInterface
{
    /**
     * @param int $amount
     * @return array
     */
    public function getBanknotesByAmount(int $amount): array;
}
