<?php

namespace CashMachine\Domain\CashMachine;

use PHPUnit\Framework\TestCase;

class WithdrawServiceTest extends TestCase
{
    /**
     * @test
     * @dataProvider getData
     * @param $expectedResult
     * @param $inputAmount
     */
    public function getBanknotesByAmount_test($expectedResult, $inputAmount)
    {
        // prepare
        $classUnderTest = new WithdrawService();

        // test
        $result = $classUnderTest->getBanknotesByAmount($inputAmount);

        // verify
        $this->assertEquals($expectedResult, $result);
    }

    public function getData()
    {
        return [
            [[100 => 1, 50 => 1, 20 => 0, 10 => 0], 150],
            [[100 => 1, 50 => 0, 20 => 1, 10 => 1], 130]
        ];
    }

    /**
     * @test
     * @expectedException \CashMachine\Domain\CashMachine\NoteUnavailableException
     */
    public function getBanknotesByAmount_withUnreachableAmount_test()
    {
        // prepare
        $classUnderTest = new WithdrawService();

        // test
        $classUnderTest->getBanknotesByAmount(123);

        // verified by test declaration
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function getBanknotesByAmount_withInvalidAmount_test()
    {
        // prepare
        $classUnderTest = new WithdrawService();

        // test
        $classUnderTest->getBanknotesByAmount(-1.5);

        // verified by test declaration
    }

}