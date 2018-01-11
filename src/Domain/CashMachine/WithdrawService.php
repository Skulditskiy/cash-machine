<?php

namespace CashMachine\Domain\CashMachine;

class WithdrawService implements WithdrawServiceInterface
{
    const AVAILABLE_BANKNOTES = [100, 50, 20, 10];

    /**
     * @param int $amount
     * @return array
     * @throws \InvalidArgumentException
     * @throws NoteUnavailableException
     */
    public function getBanknotesByAmount(int $amount): array
    {
        if ($amount < 0) {
            throw new \InvalidArgumentException();
        }

        $result = [];
        foreach (self::AVAILABLE_BANKNOTES as $banknote) {
            $result[$banknote] = intdiv($amount, $banknote);
            $amount = $amount % $banknote;
        }

        if ($amount > 0) {
            throw new NoteUnavailableException();
        }

        return $result;
    }
}

