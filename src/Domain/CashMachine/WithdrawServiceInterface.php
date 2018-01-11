<?php

namespace CashMachine\Domain\CashMachine;

interface WithdrawServiceInterface
{
    /**
     * @param int $amount
     * @return array
     * @throws \InvalidArgumentException
     * @throws NoteUnavailableException
     */
    public function getBanknotesByAmount(int $amount): array;
}
