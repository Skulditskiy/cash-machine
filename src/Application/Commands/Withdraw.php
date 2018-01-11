<?php

namespace CashMachine\Application\Commands;

use CashMachine\Domain\CashMachine\NoteUnavailableException;
use CashMachine\Domain\CashMachine\WithdrawServiceInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Withdraw extends Command
{
    /**
     * @var WithdrawServiceInterface
     */
    private $withdrawService;

    public function __construct(WithdrawServiceInterface $withdrawService)
    {
        parent::__construct();
        $this->withdrawService = $withdrawService;
    }

    protected function configure()
    {
        $this
            ->setName('cashMachine:withdraw')
            ->setDescription('Return banknotes for withdraw given amount of money')
            ->addArgument('amount', InputArgument::REQUIRED, 'The username of the user.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = [];

        try {
            $amount = intval($input->getArgument('amount'));
            if ($amount <= 0) {
                throw new \InvalidArgumentException();
            }
            $result = $this->withdrawService->getBanknotesByAmount($amount);
        } catch (\InvalidArgumentException $exception) {
            echo 'Provided amount is invalid';
        } catch (NoteUnavailableException $exception) {
            echo 'CashMachine is unavailable to withdraw provided amount';
        }

        foreach ($result as $banknoteAmount => $banknoteCount) {
            $output->writeln('$' . $banknoteAmount . ' = ' . $banknoteCount . 'pcs');
        }
    }
}
