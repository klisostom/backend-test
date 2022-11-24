<?php

namespace Klisostom\BackendTest\Investment;

use DateTime;
use Exception;
use Klisostom\BackendTest\Balance\Balance;
use Klisostom\BackendTest\Interfaces\IInvestment;

class Investment implements IInvestment
{


    public function __construct(
        private int $ownerId,
        private float $amount,
        private DateTime $creationDate,
    ) {
    }

    public function isValidDate()
    {
        $isValid = true;
        return $this->creationDate->format("Y-m-d") > date("Y-m-d") ?
            throw new Exception("An investment's creation date cannot be in the future.") :
            $isValid;
    }

    public function isValidAmount()
    {
        $nothing = 0;
        $isValid = true;

        return $this->amount < $nothing ?
            throw new Exception("An investment's amount cannot be negative.") :
            $isValid;
    }

    public function makeIvestment()
    {
        if ($this->isValidAmount() && $this->isValidDate()) {
            return (new InvestmentRepository)->create([
                'ownerId' => $this->ownerId,
                'amount' => $this->amount,
                'creationDate' => $this->creationDate->format("Y-m-d"),
            ]);
        }

        throw new \Exception("Invalid invetment. Try again!", 1);
    }

    public function balance(int $ownerId): float
    {
        $investment = (new InvestmentRepository)->investmentByOwner($ownerId);
        return (new Balance)->balance($investment);
    }
}
